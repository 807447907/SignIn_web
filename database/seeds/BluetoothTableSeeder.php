<?php

use Illuminate\Database\Seeder;

class BluetoothTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Bluetooth::create([
            'address' => '00:10:20:30:40:50',
        ]);
        App\Bluetooth::create([
            'address' => '00:10:20:30:40:60',
        ]);
        App\Bluetooth::create([
            'address' => '00:10:20:30:40:70',
        ]);
    }
}
