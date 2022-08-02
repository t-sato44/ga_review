<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::create([
            'name' => 'PS4',
        ]);

        Device::create([
            'name' => 'PS5',
        ]);

        Device::create([
            'name' => 'PS4,PS5,PC',
        ]);

    }
}
