<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defect extends Model
{
    protected $table 		= 'defect';
    protected $primaryKey 	= 'id';

    protected $fillable 	= ['area_detail_id', 'name', 'description'];

    public $timestamps		= false;

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtoupper($value);
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = ucwords($value);
    }


    public function area_detail() {
        return $this->belongsTo('App\AreaDetail');
    }

    


}
