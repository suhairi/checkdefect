<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
	protected $table 		= 'house';
    protected $primaryKey 	= 'id';

    protected $fillable 	= ['name', 'user_id', 'address', 'dev_name', 'dev_address', 'dev_phone'];

    public $timestamps		= false;

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords($value);
    }

    public function setDevNameAttribute($value) {
    	$this->attributes['dev_name'] = ucwords($value);
    }

    public function setDevAddressAttribute($value) {
    	$this->attributes['dev_address'] = ucwords($value);
    }    

    public function setAddressAttribute($value) {
    	$this->attributes['address'] = ucwords($value);
    }

    public function user() {
    	return $this.belongsTo('App\User');
    }


}
