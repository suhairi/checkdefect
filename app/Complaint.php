<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table 		= 'complaint';
    protected $primaryKey	= 'id';
    protected $fillable 	= ['name', 'user_id', 'area_id', 'area_detail_id', 'defect', 'image', 'status', 'notes'];

    public $timestamps      = false;

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setDefectAttribute($value) {
        $this->attributes['defect'] = ucwords($value);
    }

    public function setNotesAttribute($value) {
        $this->attributes['notes'] = ucwords($value);
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function area() {
    	return $this->belongsTo('App\Area');
    }

    public function area_detail() {
    	return $this->belongsTo('App\AreaDetail');
    }

    public function house() {
        return $this->belongsTo('App\House', 'name', 'id');
    }
}
