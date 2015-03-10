<?php

use Faker\Factory as Faker;
use Faker\Factory;
use Uninett\Eloquent\Conferences\Conference;
use Uninett\Eloquent\Users\User;
use Uninett\Eloquent\Sessions\Session;


class RatingsTableSeeder extends Seeder {

    private $faker;

    public function run()
    {
        $this->faker = Faker::create();

        $user_ids = User::lists('id');

        $this->createRatings(Conference::all(), $user_ids);

        $this->createRatings(Session::all(), $user_ids);

    }

    /**
     * @param $user_ids
     * @param $models
     */
    private function createRatings($models, $user_ids)
    {
        foreach($models as $model)
        {
            $numberOfRatings = $this->faker->numberBetween(0, count($user_ids) / 3);

            $uniqueUser = $this->faker->unique($reset = true)->randomElement($user_ids);

            foreach (range(1, $numberOfRatings) as $ratingNumber) {
                $model->ratings()->create([
                    'user_id' => $uniqueUser,
                    'score' => $this->faker->numberBetween(1, 10),
                    'text' => $this->faker->paragraph()
                ]);
                if (!($ratingNumber == $numberOfRatings)) $uniqueUser = $this->faker->unique()->randomElement($user_ids);
            }
        }
    }

}