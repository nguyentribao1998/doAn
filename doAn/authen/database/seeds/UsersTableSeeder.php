<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Nguyễn Chí Bảo',
            'email'=>'nguyentribao40@gmail.com',
            'password'=>Hash::make('tientai1998'),
            'role'=>1


        ]);
    }
}
