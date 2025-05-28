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

    /**
     * Properties that match relationship names; i.e. a class
     * has a property 'venue' and a BelongsTo relationship
     * 'venue'. By default only one will be generated to avoid
     * conflicting type validation.
     */
    'duplicateRelations' => [
        // 'venue',
    ],
];
