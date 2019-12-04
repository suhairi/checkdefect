<?php

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
    	DB::table('users')->insert([
    		'name'		=> 'Suhairi Abdul Hamid',
    		'email'		=> 'suhairi81@gmail.com',
    		'password'	=> bcrypt('12345'),
    	]);

    	DB::table('users')->insert([
    		'name'		=> 'Khairul Azuar',
    		'email'		=> 'khairul@gmail.com',
    		'password'	=> bcrypt('12345'),
    	]);

    	        
    }
}
