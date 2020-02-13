<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RuangDetail extends Model
{
	protected $table 		= 'ruang_detail';
    protected $primaryKey 	= 'id';

    protected $fillable 	= ['name', 'description'];

    public $timestamps		= false;
}
