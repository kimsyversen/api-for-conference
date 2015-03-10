<?php

abstract class UninettSeeder extends Seeder {

	/**
     * Get the specified number of random elements from the collection
     *
     * @param $collection
     * @param $number
     * @return array
     */
    protected function getRandomCollectionIds($collection, $number)
    {
        if($number == 0)
            return [];
        else if($number == 1)
            return [array_rand($collection->lists('id'), $number)];

        return array_rand($collection->lists('id'), $number);
    }

}