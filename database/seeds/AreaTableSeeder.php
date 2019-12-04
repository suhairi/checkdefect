<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik tidur utama'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik 1'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik 2'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik 3'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik 4'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik 5'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik 6'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik air 1'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik air 2'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik air 3'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik air 4'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik air 5'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik setor'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('bilik utiliti'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('luar, depan rumah'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('luar, kanan rumah'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('luar, kiri rumah'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('luar, belakang rumah'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('ruang tamu (living room)'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('ruang makan (dining room)'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('pantri'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('ruang legar'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('ruang keluarga (family area)'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('dapur'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('dapur basah (wet kitchen)'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('dapur kering (dry kitchen'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('tangga'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('balkoni'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('laluan (hallway)'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('tempat letak kereta (porch)'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('Teres (terrace)'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('anjung hadapan'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('anjung belakang'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('anjung sisi'),
        	'description' => ''
        ]);

        DB::table('area')->insert([
        	'name'	=> strtoupper('yard'),
        	'description' => ''
        ]);
     
        
    }
}
