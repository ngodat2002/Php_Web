<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
               'id'=> 1,
               'name'=>'CodeLean',
               'email'=>'CodeLean@gmail.com',
               'password'=> Hash::make('123456'),
               'avatar'=>null,
               'level'=>0,
               'description'=>null,
           ],
            [
                'id'=> 2,
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=> Hash::make('123456'),
                'avatar'=>null,
                'level'=>0,
                'description'=>null,
            ],
            [
                'id'=> 3,
                'name'=>'Dat',
                'email'=>'dat@gmail.com',
                'password'=> Hash::make('123456'),
                'avatar'=>null,
                'level'=>0,
                'description'=>null,
            ],
            [
                'id'=> 4,
                'name'=>'Thanh',
                'email'=>'thanh@gmail.com',
                'password'=> Hash::make('123456'),
                'avatar'=>null,
                'level'=>0,
                'description'=>null,
            ],
            [
                'id'=> 5,
                'name'=>'Tuan',
                'email'=>'tuan@gmail.com',
                'password'=> Hash::make('123456'),
                'avatar'=>null,
                'level'=>0,
                'description'=>null,
            ],
        ]);
    }
}
