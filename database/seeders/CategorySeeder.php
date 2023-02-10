<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = [
            'name' => 'SUV',
            'description' => 'SUV stands for Sports Utility Vehicle that combines the features of a passenger car with those of a light truck.',
        ];
        $category2 = [
            'name' => 'Sedan',
            'description' => 'A sedan, also known as a saloon, is a type of passenger car with a closed body style and four doors.',
        ];
        $category3 = [
            'name' => 'Van',
            'description' => 'A van is a type of vehicle with a cargo area and limited seating, used for transporting goods or people.',
        ];
        $category4 = [
            'name' => 'EV',
            'description' => 'Electric vehicles (EVs) are powered by electric motors and rechargeable batteries instead of gasoline or diesel engines.',
        ];
        $category5 = [
            'name' => 'Sports Car',
            'description' => 'Sports cars are designed for high performance and are often faster and more agile than other types of cars.',
        ];

        Category::create($category1);
        Category::create($category2);
        Category::create($category3);
        Category::create($category4);
        Category::create($category5);
    }
}
