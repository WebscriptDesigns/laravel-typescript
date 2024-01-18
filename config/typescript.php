<?php

use Based\TypeScript\Generators\ModelGenerator;
use Illuminate\Database\Eloquent\Model;

return [
    'generators' => [
        Model::class => ModelGenerator::class,
    ],

    'paths' => [
        //
    ],

    'customRules' => [
        // \App\Rules\MyCustomRule::class => 'string',
        // \App\Rules\MyOtherCustomRule::class => ['string', 'number'],
    ],

    'output' => resource_path('js/models.d.ts'),

    'enumsOutput' => resource_path('js/enums.ts'),

    'autoloadDev' => false,
];
