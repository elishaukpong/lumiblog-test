<?php

namespace Database\Seeders;

use App\Models\User;
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
        $adminUser = User::factory()->create();
        $adminUser->assignRole('Admin');


        User::factory(10)->create()->each(function($user){
            $user->assignRole('User');
        });

    }
}
