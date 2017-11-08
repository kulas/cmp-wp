<?php

namespace App;

function custom_tinymce_styles($arr) {
    $style_formats = [
        [
            'title' => 'Headers',
            'items' => [
                [
                    'title' => 'Header 1',
                    'format' => 'h1'
                ],
                [
                    'title' => 'Header 2',
                    'format' => 'h2'
                ],
                [
                    'title' => 'Header 3',
                    'format' => 'h3'
                ],
                [
                    'title' => 'Header 4',
                    'format' => 'h4'
                ],
                [
                    'title' => 'Header 5',
                    'format' => 'h5'
                ]
            ]
        ],
        [
            'title' => 'Buttons',
            'items' => [
                [
                    'title' => 'Small Button',
                    'inline' => 'span',
                    'classes' => 'button--small',
                    'wrapper' => false
                ],
                [
                    'title' => 'Medium Button',
                    'inline' => 'span',
                    'classes' => 'button',
                    'wrapper' => false
                ],
                [
                  'title' => 'Large Button',
                  'inline' => 'span',
                  'classes' => 'button--large',
                  'wrapper' => false
              ]
            ]
        ]
    ];

    $arr['style_formats'] = json_encode($style_formats);
    return $arr;
}
add_filter('tiny_mce_before_init', 'App\\custom_tinymce_styles');
