<?php

use Illuminate\Database\Seeder;

class AreaDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // 1
        for($i=15; $i<=18; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> '15',
	        	'name'		=> strtoupper('pintu pagar luar')
	        ]);
	    }


        // 2 
        for($i=15; $i<=18; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> '15',
	        	'name'		=> strtoupper('pagar luar')
	        ]);
	    }

        // 3
        for($i=15; $i<=18; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> '15',
	        	'name'		=> strtoupper('tembok luar')
	        ]);
	    }

        // 4
        for($i=15; $i<=18; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> '15',
	        	'name'		=> strtoupper('parit luar rumah')
	        ]);
	    }

        // 5
        for($i=15; $i<=18; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> '15',
	        	'name'		=> strtoupper('longkang keliling (perimeter drain)')
	        ]);
	    }

        // 6
        for($i=15; $i<=18; $i++) {
			DB::table('area_detail')->insert([
	        	'area_id'	=> '15',
	        	'name'		=> strtoupper('apron (lantai antara dinding dan longkang')
	        ]);
		}

        // 7

        for($i=1; $i<=35; $i++) {
        	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('dinding')
	        ]);        	
        }
        
        // 8
        for($i=1; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('lantai')
	        ]);
	    }

	    //9
	    for($i=1; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('siling')
	        ]);
	    }

	    // 10
	    for($i=1; $i<=26; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('pintu')
	        ]);
	    }

	    DB::table('area_detail')->insert([
        	'area_id'	=> '28',
        	'name'		=> strtoupper('pintu')
        ]);

        for($i=31; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('pintu')
	        ]);
	    }

        // 11
        for($i=1; $i<=26; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('pintu sliding')
	        ]);
	    }

	    DB::table('area_detail')->insert([
        	'area_id'	=> '28',
        	'name'		=> strtoupper('pintu sliding')
        ]);

	    for($i=30; $i<=35; $i++) {
		    DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('pintu sliding')
	        ]);
		}

        // 12
        for($i=1; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('tingkap')
	        ]);
	    }

        // 13
        for($i=1; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('bumbung')
	        ]);
	    }

        // 14
        for($i=15; $i<=18; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('tiang')
	        ]);
	    }

        for($i=31; $i<=34; $i++) {
        	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('tiang')
	        ]);
        }

        // 15
        for($i=1; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('suis')
	        ]);
	    }


        // 16
	    for($i=1; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('plug')
	        ]);
	    }

	    //17
	    for($i=1; $i<=6; $i++) {
	    	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('pili/paip air')
	        ]);
	    }

	    DB::table('area_detail')->insert([
        	'area_id'	=> '13',
        	'name'		=> strtoupper('plug')
        ]);

	    for($i=15; $i<=21; $i++) {
	    	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('plug')
	        ]);
	    }

		for($i=24; $i<=26; $i++) {
	    	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('plug')
	        ]);
	    }

	    // 18
	    DB::table('area_detail')->insert([
        	'area_id'	=> '27',
        	'name'		=> strtoupper('tangga')
        ]);

        // 19
        for($i=1; $i<=7; $i++) {
        	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('tangga')
	        ]);
        }

        for($i=32; $i<=43; $i++) {
        	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('tangga')
	        ]);
        }

	    //20
	    for($i=1; $i<=6; $i++) {
        	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('sinki')
	        ]);
        }

        for($i=13; $i<=14; $i++) {
        	DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('sinki')
	        ]);
        }

        for($i=19; $i<=26; $i++) {
        	DB::table('area_detail')->insert([
	        	'area_id'	=> '27',
	        	'name'		=> strtoupper('sinki')
	        ]);
        }

        //21
        for($i=1; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('elektrikal')
	        ]);
	    }

	    // 22
	    for($i=1; $i<=14; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('kelengkapan dalaman')
	        ]);
	    }

	    for($i=19; $i<=35; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('kelengkapan dalaman')
	        ]);
	    }

	    // 23
	    for($i=15; $i<=18; $i++) {
	        DB::table('area_detail')->insert([
	        	'area_id'	=> $i,
	        	'name'		=> strtoupper('halaman/tanah')
	        ]);
	    }

        
    

    }
}
