<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
        	'name'			=> strtoupper('teres'),
        	'description'	=> ''
        ]);

        DB::table('type')->insert([
        	'name'			=> strtoupper('semi-d berkembar'),
        	'description'	=> ''
        ]);

        DB::table('type')->insert([
        	'name'			=>strtoupper('banglo'),
        	'description'	=> ''
        ]);

        DB::table('type')->insert([
        	'name'			=>strtoupper('flat'),
        	'description'	=> ''
        ]);

        DB::table('type')->insert([
        	'name'			=>strtoupper('apartment / pangsapuri'),
        	'description'	=> ''
        ]);

        DB::table('type')->insert([
        	'name'			=>strtoupper('kondominium'),
        	'description'	=> ''
        ]);

        DB::table('type')->insert([
        	'name'			=>strtoupper('SOHO / kediaman servis'),
        	'description'	=> ''
        ]);

        DB::table('type')->insert([
        	'name'			=>strtoupper('townhouse'),
        	'description'	=> ''
        ]);

    }
}
