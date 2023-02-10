<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Brand1 = [
            'name' => 'Tesla',
        ];
        $Brand2 = [
            'name' => 'Mahindra',
        ];
        $Brand3 = [
            'name' => 'Kawasaki',
        ];
        $Brand4 = [
            'name' => 'Lamborghini',
        ];
        $Brand5 = [
            'name' => 'Mercedes',
        ];

        Brand::create($Brand1);
        Brand::create($Brand2);
        Brand::create($Brand3);
        Brand::create($Brand4);
        Brand::create($Brand5);
    }
}
