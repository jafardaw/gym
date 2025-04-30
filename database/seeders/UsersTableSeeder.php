<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              User::create([
                    'name' => 'المدير العام',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin'
                ]);
        
                User::factory()->count(10)->create();
            }
    }

