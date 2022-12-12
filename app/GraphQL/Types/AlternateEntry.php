<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use Statamic\Facades\GraphQL;

class AlternateEntry extends GraphQLType
{
    public const NAME = 'AlternateEntry';

    protected $attributes = [
        'name' => self::NAME,
    ];

    public function fields(): array
    {
        return [
            'title' => [
                'type' => GraphQL::nonNull(GraphQL::string()),
            ],
            'url' => [
                'type' => GraphQL::nonNull(GraphQL::string()),
            ],
            'locale' => [
                'type' => GraphQL::nonNull(GraphQL::string()),
            ],
            'language' => [
                'type' => GraphQL::nonNull(GraphQL::string()),
            ],
            'is_root' => [
                'type' => GraphQL::nonNull(GraphQL::boolean()),
            ],
        ];
    }
}
