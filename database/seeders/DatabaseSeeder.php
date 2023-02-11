<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(UserSeeder::class);
       $this->call(SpecijalizacijaSeeder::class);
       $this->call(LekarSeeder::class);
       $this->call(TerminSeeder::class);
    }
}
