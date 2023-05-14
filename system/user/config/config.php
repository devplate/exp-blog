<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['index_page'] = 'index.php';
$config['site_license_key'] = '';
// ExpressionEngine Config Items
// Find more configs and overrides at
// https://docs.expressionengine.com/latest/general/system-configuration-overrides.html

$config['app_version'] = '6.4.9';
$config['encryption_key'] = 'a99588149b6780b005b2f4d24637f152f808709c';
$config['session_crypt_key'] = '0b416f812761da06a6bd7a68b684ff88a047900b';
$config['database'] = array(
	'expressionengine' => array(
		'hostname' => 'localhost',
		'database' => 'joysafaribay',
		'username' => 'root',
		'password' => '123Dev!@#',
		'dbprefix' => 'exp_',
		'char_set' => 'utf8mb4',
		'dbcollat' => 'utf8mb4_unicode_ci',
		'port'     => ''
	),
);
$config['show_ee_news'] = 'y';

// EOF