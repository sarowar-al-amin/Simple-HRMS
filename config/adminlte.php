<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'BS23 HRMS',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>BS23</b>HRMS',
    'logo_img' => 'vendor/adminlte/dist/img/logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => null, //'register',
    'password_reset_url' => null, //'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        //  items:
        [
            'type'         => '-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'search',
        // ],
        // [
        //     'text' => 'blog',
        //     'url'  => 'admin/blog',
        //     'can'  => 'manage-blog',
        // ],
        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],
        // [
        //     'text' => 'profile',
        //     'url'  => 'admin/settings',
        //     'icon' => 'fas fa-fw fa-user',
        // ],
        [
            'text'    => 'Dashboard',
            'icon'    => 'fas fa-fw fa-tachometer-alt',
            'submenu' => [
                // [
                //     'text' => 'level_one',
                //     'url'  => '#',
                // ],
                // [
                //     'text'    => 'level_one',
                //     'url'     => '#',
                //     'submenu' => [
                //         [
                //             'text' => 'level_two',
                //             'url'  => '#',
                //         ],
                //         [
                //             'text'    => 'level_two',
                //             'url'     => '#',
                //             'submenu' => [
                //                 [
                //                     'text' => 'level_three',
                //                     'url'  => '#',
                //                 ],
                //                 [
                //                     'text' => 'level_three',
                //                     'url'  => '#',
                //                 ],
                //             ],
                //         ],
                //     ],
                // ],
                [
                    'icon' => 'fas fa-fw fa-list',
                    'text' => 'Employee List',
                    'route'  => 'employees.index',
                    'can' => 'admin',

                ],
                [
                    'icon' => 'fas fa-fw fa-solid fa-user',
                    'text' => 'Profile',
                    'route'  => 'home',
                    // 'can' => 'admin',

                ],
                [
                    'icon' => 'fas fa-chart-pie',
                    'text' => 'Overview',
                    'route'  => 'overview',
                    'can' => 'admin',

                ],
            ],
        ],
        [
            'text' => 'PMS',
            'can' => 'admin',
            'icon' => 'fas fa-fw fa-balance-scale',
            'submenu' => [
                [
                    'text' => 'Quarters',
                    'route' => 'quarters.index',
                    'icon' => 'fas fa-fw fa-clock',
                ],
                [
                    'text' => 'Salary Reviews',
                    'route' => 'salary-reviews.index',
                    'icon' => 'fas fa-fw fa-search-dollar',
                ],
                [
                    'text' => 'Bonus Reviews',
                    'route' => 'bonus-reviews-index',
                    'icon' => 'fas fa-fw fa-box',
                ]
            ]
        ],
        [
            'text' => 'Import File',
            'can' => 'admin',
            'icon' => 'fas fa-fw fa-upload',
            'submenu' => [
                [
                    'text' => 'Import Employee Excel',
                    'icon' => 'fas fa-fw fa-upload',
                    'route' => 'employeeImport',
                ],
                [
                    'text' => 'Import Level',
                    'icon' => 'fas fa-fw fa-upload',
                    'route' => 'levelImport',
                    // 'can' => 'review-employees'
                ],
                // [
                //     'text' => 'Import Bonus Review',
                //     'icon' => 'fas fa-fw fa-upload',
                //     'route' => 'bonus-review.import',
                //     'can' => 'admin'
                // ]
            ]
        ],
        // [
        //     'text' => 'Export File',
        //     'can' => 'admin',
        //     'icon' => 'fas fa-fw fa-download',
        //     'can' => 'admin',
        //     'submenu' => [
        //         [
        //             'text' => 'Salary Review',
        //             'icon' => 'fas fa-fw fa-download',
        //             'route' => 'exportFile',
        //         ],
        //         [
        //             'text' => 'Bonus Review',
        //             'icon' => 'fas fa-fw fa-download',
        //             'route' => 'bonusReviewExport',
        //         ]
        //     ]
        // ],
        [
            'text' => 'Level Hierarchy',
            'icon' => 'fas fa-fw fa-layer-group',
            'route' => 'employee-levels',
        ],
        // [
        //     'text' => 'Employee Review',
        //     'icon' => 'fas fa-fw fa-layer-group',
        //     'route' => 'employee-salary-reviews.index',
        //     'can' => 'review-employees'
        // ],
        [
            'text' => 'Employee Review',
            'can' => 'admin',
            'icon' => 'fas fa-fw fa-gifts',
            'can' => 'review-employees',
            'submenu' => [
                [
                    'text' => 'Employee Salary & Bonus Review',
                    'icon' => 'fas fa-fw fa-gift',
                    'route' => 'employee-salary-reviews.index',
                ],
                [
                    'text' => 'Employee Bonus Review',
                    'icon' => 'fas fa-fw fa-gift',
                    'route' => 'employee-bonus-reviews-calculation.index',
                ]
            ]
        ],
        // [
        //     'text' => 'Bonus Review',
        //     'icon' => 'fas fa-fw fa-gift',
        //     'route' => 'bonus-reviews',
        //     'can' => 'review-employees'
        // ],
        [
            'text' => 'Rset Password Of Others',
            'icon' => 'fas fa-fw fa-key fa-flip-horizontal',
            'route' => 'passwordreset',
            'can' => 'admin'
        ],
        [
            'text' => 'Password Reset',
            'icon' => 'fas fa-fw fa-key',
            'route' => 'show-password',
            // 'can' => 'admin'
        ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],
        [
            'text' => 'Resource Utilization',
            'icon' => 'fas fa-fw fa-list',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Employee Scoreboard',
                    'route' => 'scoreboard.show',
                    'icon' => 'fas fa-fw fa-regular fa-clipboard',
                ],
                [
                    'text' =>'Resource Calender',
                    'route' => 'scoreboard.employeeList',
                    'icon' => 'fas fa-fw fa-brans fa-columns',
                ],
                // [
                //     'text' =>'Bench Report',
                //     'route' => 'bench.report',
                //     'icon' => 'fas fa-fw fa-search-dollar',
                // ],
                // [
                //     'text' =>'Resource Requisition',
                //     //'route' => 'bench.report',
                //     'icon' => 'fas fa-fw fa-search-dollar',
                // ],
            ]
        ],
        [
            'text' => 'Employee activation',
            'icon' => 'fas fa-brands fa-ban',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Change Activation',
                    'route' => 'activation.index',
                    'icon' => 'fas fa-brands fa-user-slash',
                ],
                [
                    'text' =>'Inactive Employee List',
                    'route' => 'inactive.employeeList',
                    'icon' => 'fas fa-brands fa-users-slash',
                ],
                // [
                //     'text' =>'Parmanent Deletion of a user',
                //     'route' => 'scoreboard.employeeList',
                //     'icon' => 'fas fa-solid fa-trash',
                // ]
            ]
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Adminlte' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/adminlte/dist/css/adminlte.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/adminlte/dist/js/adminlte.min.js',
                ],
            ],
        ],
        // 'Select2' => [
        //     'active' => true,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => false,
        //             'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
        //         ],
        //         [
        //             'type' => 'css',
        //             'asset' => false,
        //             'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
        //         ],
        //     ],
        // ],
        // 'Chartjs' => [
        //     'active' => true,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => false,
        //             'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
        //         ],
        //     ],
        // ],
        // 'Sweetalert2' => [
        //     'active' => true,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => false,
        //             'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
        //         ],
        //     ],
        // ],
        // 'Pace' => [
        //     'active' => true,
        //     'files' => [
        //         [
        //             'type' => 'css',
        //             'asset' => false,
        //             'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
        //         ],
        //         [
        //             'type' => 'js',
        //             'asset' => false,
        //             'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
        //         ],
        //     ],
        // ],
        // 'TempusDominusBs4' => [
        //     'active' => true,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => true,
        //             'location' => 'vendor/moment/moment.min.js',
        //         ],
        //         [
        //             'type' => 'js',
        //             'asset' => true,
        //             'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        //         ],
        //         [
        //             'type' => 'css',
        //             'asset' => true,
        //             'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        //         ],
        //     ],
        // ],
        // 'bs-custom-file-input' => [
        //     'active' => true,
        //     'files' => [
        //         [
        //             'type' => 'js',
        //             'asset' => true,
        //             'location' => 'vendor/bs-custom-file-input/bs-custom-file-input.min.js',
        //         ],
        //     ],
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use__items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
