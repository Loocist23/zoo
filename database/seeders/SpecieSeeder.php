<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Specie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specie::factory(10)
            ->has(Animal::factory()->count(10))
            ->create();

    }
}
