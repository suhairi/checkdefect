<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(TypeDetailTableSeeder::class);
        $this->call(AreaDetailTableSeeder::class);
        $this->call(DefectTableSeeder::class);
    }
}
