<?php namespace tests\helpers;

use DB;
use Eloquent;
use Laracasts\TestDummy\BuildableRepositoryInterface;
use Laracasts\TestDummy\TestDummyException;

class CustomBuilder implements BuildableRepositoryInterface{

    /**
     * Build the entity with attributes.
     *
     * @param string $type
     * @param array $attributes
     * @throws TestDummyException
     * @return mixed
     */
    public function build($type, array $attributes)
    {
        if ( ! class_exists($type))
        {
            throw new TestDummyException("The {$type} model was not found.");
        }

        $object = $this->fill($type, $attributes);

        if ($object instanceof \Eloquent && array_key_exists('id', $attributes))
        {
            Eloquent::unguard();
            $object = $object->findOrNew($attributes['id'])->fill($attributes);
            Eloquent::reguard();
        }

        return $object;
    }

    /**
     * Persist the entity.
     *
     * @param $entity
     * @return mixed
     */
    public function save($entity)
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $entity->save();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Get all attributes for the model.
     *
     * @param  object $entity
     * @return array
     */
    public function getAttributes($entity)
    {
        return $entity->getAttributes();
    }

    /**
     * Force fill an object with attributes.
     *
     * @param  string $type
     * @param  array $attributes
     * @return Eloquent
     */
    private function fill($type, $attributes)
    {
        Eloquent::unguard();

        $object = (new $type)->fill($attributes);

        Eloquent::reguard();

        return $object;
    }
}