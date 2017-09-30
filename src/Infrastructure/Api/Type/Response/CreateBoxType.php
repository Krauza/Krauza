<?php

namespace Krauza\Infrastructure\Api\Type\Response;

use GraphQL\Type\Definition\ObjectType;
use Krauza\Core\Entity\Box;
use Krauza\Infrastructure\Api\Type\Object\BoxType;

class CreateBoxType extends ObjectType
{
    private static $instance;

    public function __construct()
    {
        $config = [
            'fields' => [
                'box' => [
                    'type' => BoxType::getInstance(),
                    'description' => 'Created box'
                ]
            ]
        ];

        parent::__construct($config);
    }

    public static function getInstance(): self
    {
        return self::$instance ?: (self::$instance = new self);
    }

    public static function toResponseFormat(Box $box): array
    {
        return [
            'box' => BoxType::toResponseFormat($box)
        ];
    }
}