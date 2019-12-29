<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table 		= 'complaint';
    protected $primaryKey	= 'id';
    protected $fillable 	= ['house_id', 'user_id', 'area_id', 'area_detail_id', 'defect_id', 'image', 'status', 'notes'];

    public $timestamps      = false;


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
        return $this->belongsTo('App\House');
    }

    public function defect() {
        return $this->belongsTo('App\Defect', 'defect_id', 'id');
    }
}
