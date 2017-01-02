<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            'role_id' => 0,
            'name' => 'admin',
            'description' => '',
        ]);

        App\Role::create([
            'role_id' => 1,
            'name' => 'teacher',
            'description' => '',
        ]);

        App\Role::create([
            'role_id' => 2,
            'name' => 'student',
            'description' => '',
        ]);
    }
}
