<?php
/**
 * This source file is part of the open source project
 * ExpressionEngine (https://expressionengine.com)
 *
 * @link      https://expressionengine.com/
 * @copyright Copyright (c) 2003-2023, Packet Tide, LLC (https://www.packettide.com)
 * @license   https://expressionengine.com/license Licensed under Apache License, Version 2.0
 */

namespace ExpressionEngine\Cli\Commands;

use ExpressionEngine\Cli\Cli;

/**
 * Command to clear selected caches
 */
class CommandMakeAddon extends Cli
{
    /**
     * name of command
     * @var string
     */
    public $name = 'Add-on Generator';

    /**
     * signature of command
     * @var string
     */
    public $signature = 'make:addon';

    /**
     * How to use command
     * @var string
     */
    public $usage = 'php eecli.php make:addon "My Awesome Add-on" --extension --hooks=category_save,after_category_field_update';

    /**
     * options available for use in command
     * @var array
     */
    public $commandOptions = [
        // Add-on types
        'extension,ext'   => 'command_make_addon_option_extension',
        'plugin,pi'       => 'command_make_addon_option_plugin',
        'fieldtype,ft'    => 'command_make_addon_option_fieldtype',
        'module,mod'      => 'command_make_addon_option_module',

        // Add-on setup toggles
        'typography,t'          => 'command_make_addon_option_typography',
        'has-settings,e:'       => 'command_make_addon_option_has',
        'compatibility-mode,p'  => 'command_make_addon_option_compatibility_mode',

        // Add-on values
        'version,v:'      => 'command_make_addon_option_version',
        'description,d:'  => 'command_make_addon_option_description',
        'author,a:'       => 'command_make_addon_option_author',
        'author-url,u:'   => 'command_make_addon_option_author_url',

        // Generate things for the addon
        'services,s*:'    => 'command_make_addon_option_services',
        'models,m*:'      => 'command_make_addon_option_models',
        'commands,c*:'    => 'command_make_addon_option_commands',
        'consents,n*:'    => 'command_make_addon_option_consents',
        'cookies,k*:'     => 'command_make_addon_option_cookies',
        'hooks,o*:'       => 'command_make_addon_option_hooks',
    ];

    protected $data = [];

    protected $type = [];

    protected $types = [
        'extension',
        'plugin',
        'fieldtype',
        'module',
    ];

    /**
     * Run the command
     * @return mixed
     */
    public function handle()
    {
        $this->info('command_make_addon_lets_build_addon');

        $this->data['name'] = $this->getName();
        $this->data['type'] = $this->getType();

        // Get description
        $this->data['description'] = $this->getOptionOrAsk(
            "--description",
            "{$this->type['name']} " . lang('command_make_addon_description_question')
        );

        // Get version
        $this->data['version'] = $this->getOptionOrAsk(
            "--version",
            "{$this->type['name']} " . lang('command_make_addon_version_question'),
            '1.0.0',
            true
        );

        // Get author
        $this->data['author'] = $this->getOptionOrAsk(
            "--author",
            "{$this->type['name']} " . lang('command_make_addon_author_question')
        );

        // Get author_url
        $this->data['author_url'] = $this->getOptionOrAsk(
            "--author-url",
            "{$this->type['name']} " . lang('command_make_addon_author_url_question')
        );

        // If they passed the settings flag, always take that
        if ($this->option('--has-settings')) {
            $this->data['has_settings'] = $this->option('--has-settings');
        } elseif ($this->data['type'] == 'plugin') {
            // Default to no if it's a plugin
            $this->data['has_settings'] = 'no';
        } else {
            // Ask if not passed and not a plugin
            $this->data['has_settings'] = $this->confirm(lang('command_make_addon_does_your') . "{$this->type['slug']} " . lang('command_make_addon_have_settings_question'));
        }

        $this->getTypeSpecificData();
        $this->getAdvancedSettings();

        $this->info('command_make_addon_lets_build');

        $this->build();

        $this->info('command_make_addon_created_successfully');
    }

    private function getTypeSpecificData()
    {
        // Extension specific options
        if ($this->type['slug'] == 'extension') {
            // No hooks were passed, so we're giving info on the hooks
            if (! $this->option('--hooks')) {
                $this->info('command_make_addon_what_hooks_to_use');
            }

            // Set or ask for what hooks to use
            $this->data['hooks'] = $this->getOptionOrAsk(
                '--hooks',
                'command_make_addon_ext_hooks',
                'example_hook'
            );
        }

        // Fieldtype specific options
        if ($this->type['slug'] == 'fieldtype') {
            $this->data['compatibility'] = $this->ask('command_make_addon_ft_compatibility');
        }
    }

    private function getAdvancedSettings()
    {
        if ($this->option('--typography')) {
            $this->data['typography'] = $this->option('--typography');
        }
        if ($this->option('--services')) {
            $this->data['services'] = $this->option('--services');
        }
        if ($this->option('--models')) {
            $this->data['models'] = $this->option('--models');
        }
        if ($this->option('--consents')) {
            $this->data['consents'] = $this->option('--consents');
        }
        if ($this->option('--cookies')) {
            $cookies = [];

            foreach ($this->option('--cookies') as $cookie) {
                if (strpos($cookie, ':') === false) {
                    continue;
                }

                $cookieSplit = explode(':', $cookie);
                $cookies[$cookieSplit[0]] = $cookieSplit[1];
            }

            $this->data['cookies'] = $cookies;
        }

        // Set the compatibilty mode
        $this->data['compatibility-mode'] = (bool) $this->option('--compatibility-mode');
    }

    private function build()
    {
        try {
            // Build the addon
            $service = ee('AddonGenerator', $this->data);

            return $service->build();
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }
    }

    private function getType()
    {
        $type = $this->getTypeFromOptions() ?: $this->ask(lang('command_make_addon_what_type_of_addon') . ' [' . implode(', ', $this->types) . ']');

        if (! in_array($type, $this->types)) {
            $this->fail('command_make_addon_select_proper_addon');
        }

        $this->type = [
            'name' => ucfirst($type),
            'slug' => $type,
        ];

        return $type;
    }

    private function getName()
    {
        // This is the name passed to the CLI
        $name = $this->getFirstUnnamedArgument();

        // If no name was passed, ask for a name
        if (is_null($name)) {
            $name = $this->ask('command_make_addon_what_is_name');
        }

        // Lets filter the name to only allow alphanumerics, "-", "_" and spaces
        $name = preg_replace("/[^A-Za-z0-9 \-_]/", '', $name);

        if (empty(trim($name))) {
            $this->fail('command_make_addon_addon_name_required');
        }

        return $name;
    }

    private function getTypeFromOptions()
    {
        foreach ($this->types as $type) {
            if ($this->option('--' . $type)) {
                return $type;
            }
        }

        return null;
    }
}
