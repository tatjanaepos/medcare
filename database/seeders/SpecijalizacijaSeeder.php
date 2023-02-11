<?php

namespace Database\Seeders;

use App\Models\Specijalizacija;
use Illuminate\Database\Seeder;

class SpecijalizacijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specijalizacija::create([
            'naziv' => 'Pedijatrija'
        ]);

        Specijalizacija::create([
            'naziv' => 'Hirurgija'
        ]);

        Specijalizacija::create([
            'naziv' => 'Pulmologija'
        ]);

        Specijalizacija::create([
            'naziv' => 'Kardiologija'
        ]);

        Specijalizacija::create([
            'naziv' => 'Psihijatrija'
        ]);

        Specijalizacija::create([
            'naziv' => 'Neurologija'
        ]);
    
    }
}
