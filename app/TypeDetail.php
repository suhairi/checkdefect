<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDetail extends Model
{
    protected $table 		= 'type_detail';
    protected $primaryKey	= 'id';

    protected $fillable 	= ['type_id', 'name', 'description'];


    public $timestamps 		= false;

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = ucwords($value);
    }

    public function type() {
    	return $this->belongsTo('App\Type');
    }

    
}
