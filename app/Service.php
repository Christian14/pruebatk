<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "services";

    protected $fillable = ['name','description','status'];

    public function incidents()
    {
    	return $this->hasMany('App\Incident');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User','user_service');
    }
}
