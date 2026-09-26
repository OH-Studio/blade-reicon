<?php

return [
    [ // Outline...
        'source' => __DIR__.'/../dist/outline',
        'destination' => __DIR__.'/../resources/svg',
        'output-prefix' => 'o-',
    ],
    [ // Solid...
        'source' => __DIR__.'/../dist/solid',
        'destination' => __DIR__.'/../resources/svg',
        'output-prefix' => 's-',
        'safe' => true,
    ],
];
