<?php

namespace Database\Seeders;

use App\Models\Lekar;
use Illuminate\Database\Seeder;

class LekarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {

            Lekar::create([
                'ime' => $faker->firstname(),
                'prezime' => $faker->lastname(),
                'specijalizacijaID' => $faker->numberBetween(1, 6)
            ]);
        }


    }
}
