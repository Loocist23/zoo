<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Animal::factory(20)
            ->for(Specie::factory()->create())
            ->create();



    }
}
