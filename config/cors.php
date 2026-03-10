<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Izinkan aplikasi frontend (Vite/dev server) mengakses endpoint API.
    |
    */
    'paths' => [
        'api/*',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://127.0.0.1:4173',
        'http://localhost:4173',
        'http://127.0.0.1:8000', // untuk akses sesama origin ketika dipakai langsung
        'http://localhost:8000',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
];
