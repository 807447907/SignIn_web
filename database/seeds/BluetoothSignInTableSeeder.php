<?php

use Illuminate\Database\Seeder;

class BluetoothSignInTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\BluetoothSignIn::create([
            'sign_in_id' => 1,
            'bluetooth_id'=>1,
        ]);
        App\BluetoothSignIn::create([
            'sign_in_id' => 1,
            'bluetooth_id'=>2,
        ]);
        App\BluetoothSignIn::create([
            'sign_in_id' => 2,
            'bluetooth_id'=>1,
        ]);
        App\BluetoothSignIn::create([
            'sign_in_id' => 2,
            'bluetooth_id'=>2,
        ]);
    }
}
