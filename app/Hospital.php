<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table='hospital';
    protected $fillable=['id','name','city_id'];

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function doctors(){
        return $this->belongsToMany('App\Doctor');
    }
}
