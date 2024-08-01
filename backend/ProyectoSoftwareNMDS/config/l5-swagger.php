<?php

return [
    'api' => [
        'title' => 'Swagger UI',
        'auth_token' => env('L5_SWAGGER_API_AUTH_TOKEN', false),
        'key_var' => env('L5_SWAGGER_API_KEY_VAR', 'api_key'),
        'security_definition' => env('L5_SWAGGER_API_SECURITY_DEFINITION', 'api_key'),
        'key_inject' => env('L5_SWAGGER_API_KEY_INJECT', 'query'),
        'version' => env('L5_SWAGGER_API_VERSION', '1'),
        'swagger_version' => env('L5_SWAGGER_DEFAULT_API_VERSION', '1'),
    ],
    
    'routes' => [
        'api' => 'api/documentation',
        'docs' => 'docs',
        'middleware' => [
            'api' => ['web'],
            'docs' => [],
        ],
    ],
    
    'paths' => [
        'docs' => storage_path('api-docs'),
        'docs_json' => 'api-docs.json',
        'annotations' => base_path('app/Http/Controllers/DocumentacionSwagger'), // Asegúrate de que esta ruta es correcta
        'assets' => public_path('vendor/l5-swagger'),
        'assets_public' => '/vendor/l5-swagger',
        'views' => base_path('resources/views/vendor/l5-swagger'),
        'base' => env('L5_SWAGGER_BASE_PATH', null),
        'excludes' => [],
    ],
    
    'generate_always' => env('L5_SWAGGER_GENERATE_ALWAYS', false),
    'swagger_version' => env('SWAGGER_VERSION', '2.0'),
    'proxy' => false,
    'docExpansion' => env('L5_SWAGGER_DOC_EXPANSION', 'none'),
    'highlightThreshold' => env('L5_SWAGGER_HIGHLIGHT_THRESHOLD', 5000),
    'headers' => [],
    'constants' => [],
];

