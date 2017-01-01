<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);

        $this->call(CourseTableSeeder::class);
        $this->call(SignInTableSeeder::class);
        $this->call(BluetoothTableSeeder::class);
        $this->call(BluetoothSignInTableSeeder::class);
        $this->call(RecordTableSeeder::class);
    }
}
