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
        ];
        $category2 = [
            'name' => 'Sedan',
        ];
        $category3 = [
            'name' => 'Van',
        ];
        $category4 = [
            'name' => 'EV',
        ];
        $category5 = [
            'name' => 'Sports Car',
        ];
        $category6 = [
            'name' => 'Bike',
        ];


        Category::create($category1);
        Category::create($category2);
        Category::create($category3);
        Category::create($category4);
        Category::create($category5);
        Category::create($category6);
    }
}
