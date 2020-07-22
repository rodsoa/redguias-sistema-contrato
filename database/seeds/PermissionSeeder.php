<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::create([
            'name' => 'employee'
        ]);

        \Spatie\Permission\Models\Role::create([
            'name' => 'admin'
        ]);

        \Spatie\Permission\Models\Role::create([
            'name' => 'customer'
        ]);
    }
}
