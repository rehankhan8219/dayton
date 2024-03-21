<?php

return [

    // All the sections for the settings page
    'sections' => [
        // 'app' => [
        //     'title' => 'General Settings',
        //     'descriptions' => 'Application general settings.', // (optional)
        //     'icon' => 'fa fa-cog', // (optional)

        //     'inputs' => [
        //         [
        //             'name' => 'app_name', // unique key for setting
        //             'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
        //             'label' => 'App Name', // label for input
        //             // optional properties
        //             'placeholder' => 'Application Name', // placeholder for input
        //             'class' => 'form-control', // override global input_class
        //             'style' => '', // any inline styles
        //             'rules' => 'required|min:2|max:20', // validation rules for this input
        //             'value' => 'QCode', // any default value
        //             'hint' => 'You can set the app name here' // help block text for input
        //         ],
        //         [
        //             'name' => 'logo',
        //             'type' => 'image',
        //             'label' => 'Upload logo',
        //             'hint' => 'Must be an image and cropped in desired size',
        //             'rules' => 'image|max:500',
        //             'disk' => 'public', // which disk you want to upload
        //             'path' => 'app', // path on the disk,
        //             'preview_class' => 'thumbnail',
        //             'preview_style' => 'height:40px'
        //         ]
        //     ]
        // ],
        // 'email' => [
        //     'title' => 'Email Settings',
        //     'descriptions' => 'How app email will be sent.',
        //     'icon' => 'fa fa-envelope',

        //     'inputs' => [
        //         [
        //             'name' => 'from_email',
        //             'type' => 'email',
        //             'label' => 'From Email',
        //             'placeholder' => 'Application from email',
        //             'rules' => 'required|email',
        //         ],
        //         [
        //             'name' => 'from_name',
        //             'type' => 'text',
        //             'label' => 'Email from Name',
        //             'placeholder' => 'Email from Name',
        //         ]
        //     ]
        // ],
        // 'social' => [
        //     'title' => 'Social Settings',
        //     'descriptions' => 'Social media links of the application.',
        //     'icon' => 'fa fa-share',

        //     'inputs' => [
        //         [
        //             'name' => 'social_facebook_url',
        //             'type' => 'text',
        //             'label' => 'Facebook Url',
        //             'placeholder' => 'Facebook page url',
        //             'rules' => 'nullable|url|max:191',
        //         ],
        //         [
        //             'name' => 'social_instagram_url',
        //             'type' => 'text',
        //             'label' => 'Instagram Url',
        //             'placeholder' => 'Instagram page url',
        //             'rules' => 'nullable|url|max:191',
        //         ],
        //         [
        //             'name' => 'social_twitter_url',
        //             'type' => 'text',
        //             'label' => 'Twitter Url',
        //             'placeholder' => 'Twitter page url',
        //             'rules' => 'nullable|url|max:191',
        //         ],
        //         [
        //             'name' => 'social_linkedin_url',
        //             'type' => 'text',
        //             'label' => 'Linkedin Url',
        //             'placeholder' => 'Linkedin page url',
        //             'rules' => 'nullable|url|max:191',
        //         ],
        //         [
        //             'name' => 'social_pinterest_url',
        //             'type' => 'text',
        //             'label' => 'Pinterest Url',
        //             'placeholder' => 'Pinterest page url',
        //             'rules' => 'nullable|url|max:191',
        //         ],
        //     ]
        // ],
        'chat' => [
            'title' => 'Live Chat Settings',
            'descriptions' => 'Live chat settings to communicate with users.',
            'icon' => 'fa fa-chat-o',

            'inputs' => [
                [
                    'name' => 'script',
                    'type' => 'text',
                    'label' => 'Live Chat',
                    'placeholder' => '',
                    'rules' => 'nullable|max:191',
                ],
            ]
        ]
    ],

    // Setting page url, will be used for get and post request
    'url' => '/admin/settings',

    // Any middleware you want to run on above route
    'middleware' => ['is_admin'],

    // Route Names
    'route_names' => [
        'index' => 'admin.settings.index',
        'store' => 'admin.settings.store',
    ],
    
    // View settings
    'setting_page_view' => 'app_settings::settings_page',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card mb-3',
    'section_heading_class' => 'card-header',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Save Settings',
    'submit_success_message' => 'Settings has been saved.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => true,

    // Controller to show and handle save setting
    'controller' => '\QCod\AppSettings\Controllers\AppSettingController',

    // settings group
    'setting_group' => function() {
        // return 'user_'.auth()->id();
        return 'default';
    }
];
