<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table 		= 'report';
    protected $primaryKey 	= 'id';
    protected $fillable 	= ['user_id', 'house_id', 'pages', 'sent', 'status'];

    public $timestamps 		= false;

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function house() {
    	return $this->belongsTo('App\House');
    }

        
}
