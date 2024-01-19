<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
           AnimalSeeder::class,
           SpecieSeeder::class
        ]);
        
//        $seances = Seance::factory()->count(10)->create();
//        $programmes = Programme::factory()->count(4)->create();
//
//        $programmes->each(function($programme) use ($seances){
//            $programme->seances()->attach(
//                $seances->random(rand(1,3))->pluck('id')->toArray()
//            );
//        });

    }
}
