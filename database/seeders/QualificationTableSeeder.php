<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Qualification;

class QualificationTableSeeder extends Seeder
{
    public function run()
    {
        Qualification::create(['id' => '1', 'quali_name' => 'Asexual Propagation', 'image' => '']); 
        Qualification::create(['id' => '2', 'quali_name' => 'Feed Formulation and Mixing', 'image' => '']);  
        Qualification::create(['id' => '3', 'quali_name' => 'Knapsack Sprayer Calibration', 'image' => '']); 
        Qualification::create(['id' => '4', 'quali_name' => 'Baking', 'image' => '']); 
        Qualification::create(['id' => '5', 'quali_name' => 'Cooking', 'image' => '']); 
        Qualification::create(['id' => '6', 'quali_name' => 'Restaurant Service', 'image' => '']); 
        Qualification::create(['id' => '7', 'quali_name' => 'Patisserie & Confectionary', 'image' => '']); 
        Qualification::create(['id' => '8', 'quali_name' => 'Welding', 'image' => '']); 
    }
}
