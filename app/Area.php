<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table 		= 'area';
    protected $primaryKey 	= 'id';

    protected $fillable 	= ['name', 'description'];

    public $timestamps		= false;

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = ucwords($value);
    }
}
