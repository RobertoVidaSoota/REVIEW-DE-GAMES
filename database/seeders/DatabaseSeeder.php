<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\ArrayBigController;
use App\Models\Reviews;
use App\Models\Videogames;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $arrayThumb = ArrayBigController::$arrayTumb;
        $gender = ArrayBigController::$arrayGender;
        $developer = ['EA', 'Activision', 'Ubisoft', 'Sony'];

        for($i = 0; $i < 200; $i++)
        {
            $reviews = Reviews::create([
                'name_review' => $faker->name(),
                'desc_review' => $faker->text(200),
                'thumb' => $arrayThumb[rand(0, 31)],
                'date_review' => date('y-m-d'),
                'rate' => rand(1, 5),
                'fk_id_users' => rand(1, 2)
            ]);
            $videogame = Videogames::create([
                'name_game' => $faker->text(18),
                'developer' => $developer[rand(0, 3)],
                'collection' => 'All',
                'owner' => 'My studio',
                'gender' => $gender[rand(0, 5)],
                'version' => 'basic',
                'year' => rand(2000, 2022),
                'fk_id_reviews' => $reviews->id
            ]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
