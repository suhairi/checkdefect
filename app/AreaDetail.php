<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaDetail extends Model
{
    protected $table 		= 'area_detail';
    protected $primaryKey 	= 'id';

    protected $fillable 	= ['name', 'area_id', 'description'];

    public $timestamps		= false;

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = ucwords($value);
    }

    public function area() {
    	return $this->belongsTo('App\Area', 'id', 'area_id');
    }
}
