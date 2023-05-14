
(function () {
    let currentMode = null;
    let darkModeID = 'D_foxiz.themeruby.com_animals';
    if (navigator.cookieEnabled) {
        currentMode = localStorage.getItem(darkModeID);
    }
    if (null === currentMode) {
        currentMode = document.body.getAttribute('data-theme');
    }
    if ('dark' === currentMode) {
        document.body.setAttribute('data-theme', 'dark');
        let darkIcons = document.getElementsByClassName('mode-icon-dark');
        if (darkIcons.length) {
            for (let i = 0; i < darkIcons.length; i++) {
                darkIcons[i].classList.add('activated');
            }
        }
    } else {
        document.body.setAttribute('data-theme', 'default');
        let defaultIcons = document.getElementsByClassName('mode-icon-default');
        if (defaultIcons.length) {
            for (let i = 0; i < defaultIcons.length; i++) {
                defaultIcons[i].classList.add('activated');
            }
        }
    }
})();

var foxizCoreParams = {
    "ajaxurl": "https:\/\/foxiz.themeruby.com\/animals\/wp-admin\/admin-ajax.php",
    "darkModeID": "D_foxiz.themeruby.com_animals"
};
var wpcf7 = {
    "api": {
        "root": "https:\/\/foxiz.themeruby.com\/animals\/wp-json\/",
        "namespace": "contact-form-7\/v1"
    },
    "cached": "1"
};
var foxizParams = {
    "ajaxurl": "https:\/\/foxiz.themeruby.com\/animals\/wp-admin\/admin-ajax.php",
    "twitterName": "",
    "sliderSpeed": "5000",
    "sliderEffect": "slide",
    "sliderFMode": "1"
};
var uid_ded428b = {
    "uuid": "uid_ded428b",
    "name": "grid_flex_2",
    "order": "date_post",
    "posts_per_page": "8",
    "pagination": "load_more",
    "unique": "1",
    "crop_size": "foxiz_crop_g2",
    "feat_hover": "scale",
    "entry_category": "text",
    "title_tag": "h3",
    "entry_meta": ["update"],
    "review_meta": "-1",
    "sponsor_meta": "1",
    "mobile_hide_meta": ["update"],
    "mobile_last": "update",
    "entry_format": "bottom",
    "excerpt_length": "20",
    "excerpt_source": "tagline",
    "readmore": "Read More",
    "box_style": "bg",
    "block_structure": "thumbnail, category, title, divider, meta",
    "divider_style": "bold",
    "post_not_in": "33,13,16,19,21,35,37,71,67,45,40,25,27,41,54,1497,31,38,44,49",
    "paged": "1",
    "page_max": "1"
};
var elementorFrontendConfig = {
    "environmentMode": {
        "edit": false,
        "wpPreview": false,
        "isScriptDebug": false
    },
    "i18n": {
        "shareOnFacebook": "Share on Facebook",
        "shareOnTwitter": "Share on Twitter",
        "pinIt": "Pin it",
        "download": "Download",
        "downloadImage": "Download image",
        "fullscreen": "Fullscreen",
        "zoom": "Zoom",
        "share": "Share",
        "playVideo": "Play Video",
        "previous": "Previous",
        "next": "Next",
        "close": "Close"
    },
    "is_rtl": false,
    "breakpoints": {
        "xs": 0,
        "sm": 480,
        "md": 768,
        "lg": 1025,
        "xl": 1440,
        "xxl": 1600
    },
    "responsive": {
        "breakpoints": {
            "mobile": {
                "label": "Mobile",
                "value": 767,
                "default_value": 767,
                "direction": "max",
                "is_enabled": true
            },
            "mobile_extra": {
                "label": "Mobile Extra",
                "value": 880,
                "default_value": 880,
                "direction": "max",
                "is_enabled": false
            },
            "tablet": {
                "label": "Tablet",
                "value": 1024,
                "default_value": 1024,
                "direction": "max",
                "is_enabled": true
            },
            "tablet_extra": {
                "label": "Tablet Extra",
                "value": 1200,
                "default_value": 1200,
                "direction": "max",
                "is_enabled": false
            },
            "laptop": {
                "label": "Laptop",
                "value": 1366,
                "default_value": 1366,
                "direction": "max",
                "is_enabled": false
            },
            "widescreen": {
                "label": "Widescreen",
                "value": 2400,
                "default_value": 2400,
                "direction": "min",
                "is_enabled": false
            }
        }
    },
    "version": "3.9.1",
    "is_static": false,
    "experimentalFeatures": {
        "e_dom_optimization": true,
        "e_optimized_assets_loading": true,
        "e_optimized_css_loading": true,
        "e_font_icon_svg": true,
        "a11y_improvements": true,
        "additional_custom_breakpoints": true,
        "e_import_export": true,
        "e_hidden_wordpress_widgets": true,
        "landing-pages": true,
        "elements-color-picker": true,
        "favorite-widgets": true,
        "admin-top-bar": true,
        "kit-elements-defaults": true
    },
    "urls": {
        "assets": "https:\/\/foxiz.themeruby.com\/animals\/wp-content\/plugins\/elementor\/assets\/"
    },
    "settings": {
        "page": [],
        "editorPreferences": []
    },
    "kit": {
        "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
        "global_image_lightbox": "yes",
        "lightbox_enable_counter": "yes",
        "lightbox_enable_fullscreen": "yes",
        "lightbox_enable_zoom": "yes",
        "lightbox_enable_share": "yes",
        "lightbox_title_src": "title",
        "lightbox_description_src": "description"
    },
    "post": {
        "id": 2820,
        "title": "Wild%20Animals%20%E2%80%93%20Foxiz%20Theme%20Demos",
        "excerpt": "",
        "featuredImage": false
    }
};

