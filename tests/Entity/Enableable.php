<?php
namespace SpotTest\Entity;

use Spot\Entity;
use Spot\MapperInterface;
use Spot\EntityInterface;

/**
 * Disabable
 *
 * @package Spot
 */
class Enableable extends Entity
{
    protected $active = true;

    protected static $table = 'test_disabable';

    public static function fields()
    {
        return [
            'id' => [
                'type' => 'integer',
                'primary' => true,
                'autoincrement' => true,
            ],
            'active' => [
                'type' => 'boolean',
                'default' => '1',
            ]
        ];
    }

    public static function relations(
        MapperInterface $mapper,
        EntityInterface $entity
    ) {
        return [];
    }

    public function setActive(bool $value)
    {
        $this->active = $value;
        return $this;
    }

    public function getActive(): bool
    {
        return $this->active;
    }
}
