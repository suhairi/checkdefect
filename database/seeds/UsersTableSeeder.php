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
            'address'   => 'No 17, Taman Seri Impian, Jalan Kuala Ketil, 08000 Sungai Petani, Kedah.',
            'phone'     => '01162528520',
    	]);

    	DB::table('users')->insert([
    		'name'		=> 'Khairul Azuar',
    		'email'		=> 'kowndkrul@gmail.com',
    		'password'	=> bcrypt('12345'),            
    	]);

        DB::table('users')->insert([
            'name'      => 'Ali bin Saad',
            'email'     => 'ali@gmail.com',
            'password'  => bcrypt('12345'),
            'address'   => 'No 17, Taman Seri Impian, Jalan Kuala Ketil, 08000 Sungai Petani, Kedah.',
            'phone'     => '01162528520',
        ]);

        DB::table('house')->insert([
            'name'      => 'Rumah 1',
            'user_id'   => 3,
            'address'   => ucFirst('No 271 jalan sutera jaya 2/3a, taman sutera jaya, 08000 sungai petani, kedah'),
            'dev_name'  => ucFirst('Kerajaan Negeri kedah'),
            'dev_address' => 'Wisma negeri kedah darul aman',
            'dev_phone' => '047728255',
            'type_id'   => 2,
            'type_detail_id' => 5,
            'valuation_date' => Carbon\Carbon::today(),

        ]);

        

    	        
    }
}
