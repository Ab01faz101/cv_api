<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::query()->where('email' , 'admin@gmail.com')->first();
        if(empty($user)) {
             User::query()->create([
                'name' => 'admin',
                 'email' => 'admin@gmail.com',
                 'password' => bcrypt('Admin@09#'),
                 'phone' => '09121111111',
            ]);
        }

    }
}
