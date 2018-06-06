<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table='doctor';

    public function hospitals(){
        return $this->belongsToMany('App\Hospital');
    }
}
