<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table='doctor';
    protected $fillable=['firstName','lastName','age','gender'];

    public function hospitals(){
        return $this->belongsToMany('App\Hospital');
    }
}
