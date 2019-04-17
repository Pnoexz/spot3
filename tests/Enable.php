<?php
namespace SpotTest;

use SpotTest\Entity\Enableable;

/**
 * @package Spot
 */
class Enable extends \PHPUnit_Framework_TestCase
{
    private static $entities = [
        Enableable::class
    ];

    public static function setupBeforeClass()
    {
        foreach (self::$entities as $entity) {
            test_spot_mapper($entity)->migrate();
        }

        $mapper = test_spot_mapper(Enableable::class);
        $disabable = $mapper->build([
            'id' => 1,
            'active' => true,
        ]);
        $result = $mapper->insert($disabable);

        if (!$result) {
            throw new \Exception("Unable to create entity: " . var_export($disabable->data(), true));
        }
    }

    public static function tearDownAfterClass()
    {
        foreach (self::$entities as $entity) {
            test_spot_mapper($entity)->dropTable();
        }
    }

    public function testUpdateActiveField()
    {
        $mapper = test_spot_mapper(Enableable::class);
        /** @var Enableable $disabable */
        $disabable = $mapper->select()->where(['id' => 1])->first();
        $disabable->setActive(false);
        $this->assertTrue($disabable->isModified());
    }
}
