<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table = "incidents";

    protected $fillable = ['title','description','service_id'];

    public function service()
    {
    	return $this->belongsTo('App\Service');
    }
}
