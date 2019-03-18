<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'A type',
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'id'
            ],
            'nickname' => [
                'type' => Type::string(),
                'description' => '用户昵称'
            ],
            'createdAt' => [
                'type' => Type::string(),
                'description' => '创建时间'
            ]
        ];
    }
}