<?php

namespace Database\Seeders;

use App\Models\Termin;
use Illuminate\Database\Seeder;

class TerminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {

            Termin::create([
                'pacijent' => $faker->name(),
                'brojKnjizice' => $faker->numerify('######'),
                'lekarID' => $faker->numberBetween(1,20),
                'vreme' => $faker->dateTimeBetween('-6 months', '2 years')->format('H:i d/m/Y')
            ]);
        }
    }
}
