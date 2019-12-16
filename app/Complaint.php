<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table 		= 'complaint';
    protected $primaryKey	= 'id';
    protected $fillable 	= ['name', 'user_id', 'area_id', 'area_detail_id', 'defect', 'image', 'status', 'notes'];

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function user() {
    	return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function area() {
    	return $this->belongsTo('App\Area');
    }

    public function area_detail() {
    	return $this->belongsTo('App\AreaDetail');
    }
}
