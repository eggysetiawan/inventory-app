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
        User::create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'lang' => 'en',
            'password' => bcrypt('superadmin'),
            'name' => 'Super Admin',
        ]);

        User::factory()->count(5)->create();
    }
}
