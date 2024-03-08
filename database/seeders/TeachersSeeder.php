<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Teacher::create([
                'name' => $faker->name
            ]);
        }
    }
}
