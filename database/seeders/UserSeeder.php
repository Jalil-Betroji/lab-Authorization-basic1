<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                'name' => 'Jalil Betroji',
                'email' => 'jalil.betroji.solicode@gmail.com',
                'role' => 'scrum master',
                'password' => Hash::make('scrum'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hamid Achaou',
                'email' => 'hamid.achaou.solicode@gmail.com',
                'role' => 'member',
                'password' => Hash::make('hamid'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Amin Lamchatab',
                'email' => 'amin.lamchatab.solicode@gmail.com',
                'role' => 'member',
                'password' => Hash::make('amin'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Soufiane Boukhar',
                'email' => 'soufiane.boukhar.solicode@gmail.com',
                'role' => 'member',
                'password' => Hash::make('soufiane'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        
    }
}
