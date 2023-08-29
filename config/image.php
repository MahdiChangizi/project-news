<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    //index size
    'index-image-sizes' => [
        'large' => [
            'width' => 800,
            'height' => 600
        ],
         'medium' => [
            'width' => 350,
            'height' => 350
        ],
         'small' => [
            'width' => 80,
            'height' => 60
        ],
         'banner1' => [
            'width' => 728,
            'height' =>90
        ],
         'banner2' => [
            'width' => 320,
            'height' =>250
        ],

    ],

    'default-current-index-image' => 'medium',


 //index size
    'cache-image-sizes' => [
        'large' => [
            'width' => 800,
            'height' => 600
        ],
         'medium' => [
            'width' => 400,
            'height' => 300
        ],
         'small' => [
            'width' => 80,
            'height' => 60
        ],

    ],

    'default-current-cache-image' => 'medium',

    'image-cache-life-time' => 10,

    'image-not-found' => ''

];
