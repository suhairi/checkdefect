<?php

use Illuminate\Database\Seeder;

class TypeDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_detail')->insert([
        	'type_id'		=> '1',
        	'name'			=> ucWords('1 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '1',
        	'name'			=> ucWords('1½ tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '1',
        	'name'			=> ucWords('2 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '1',
        	'name'			=> ucWords('3 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '2',
        	'name'			=> ucWords('1 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '2',
        	'name'			=> ucWords('1½ tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '2',
        	'name'			=> ucWords('2 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '2',
        	'name'			=> ucWords('3 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '3',
        	'name'			=> ucWords('1 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '3',
        	'name'			=> ucWords('1½ tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '3',
        	'name'			=> ucWords('2 tingkat'),
        	'description'	=> ''
        ]);

        DB::table('type_detail')->insert([
        	'type_id'		=> '3',
        	'name'			=> ucWords('3 tingkat'),
        	'description'	=> ''
        ]);


    }
}
