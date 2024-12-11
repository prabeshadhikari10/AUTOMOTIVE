<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicle = [
            'name' => 'Scorpio',
            'category_id' => 1,
            'image' => '/vehicle_image/1675853975front-left-side-47.jpg',
            'price' => 200,
            'wheels' => '4 wheelers',
            'fuel' => 'Petrol',
            'engine' => 'Manual',
            'description' => 'I am good',
            'vehicle_no' => '850',
            'location' => 'Dharan',
            'driver_stat' => 'With Driver',
            'status' => 0,
            'trending' => 0,
            'brand' => 'Mahindra',
            'user_id' => 2,
        ];

        Vehicle::create($vehicle);
    }
}
