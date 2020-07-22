<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Domain\Models\Tables\User::class, 1)->create()->each(function($user) {
            $user->email = 'admin@admin.com';
            $user->assignRole('admin');
            $user->save();
        });

        factory(\App\Domain\Models\Tables\User::class, 10)->create()->each(function($user) {
           $user->assignRole('employee');
           $user->save();
        });
    }
}
