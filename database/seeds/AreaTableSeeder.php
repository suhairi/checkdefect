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
    
        DB::table('area')->insert(['name' => strtoupper('Bilik Tidur Utama'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik - 1'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik - 2'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik - 3'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik - 4'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik - 5'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik - 6'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik Air - 1'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik Air - 2'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik Air -3'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik Air - 4'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik Air - 5'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik Setor'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Bilik Utiliti'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Luar Depan Rumah'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Luar Tepi Rumah Kanan'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Luar Tepi Rumah Kiri'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Luar Belakang Rumah'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Ruang Tamu (Living Room)'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Ruang Makan  (Dining Room)'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Pantri'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Ruang Legar'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Ruang Keluarga (Family Area)'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Dapur'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Dapur Basah (Wet Kitchen)'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Dapur Kering (Dry Kitchen)'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Tangga'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Balkoni'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Laluan (Hallway)'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Tempat Letak Kereta (Porch)'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Teres / Terrace'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Anjung Hadapan'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Anjung Belakang'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Anjung Sisi'), 'description' => '']);
        DB::table('area')->insert(['name' => strtoupper('Yard'), 'description' => '']);
        
    }
}
