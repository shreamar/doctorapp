<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;

    protected $table='hospital';
    protected $dates=['deleted_at'];
    protected $fillable=['id','name','city_id'];

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function doctors(){
        return $this->belongsToMany('App\Doctor');
    }
}
