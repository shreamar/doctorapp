<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $table='doctor';
    protected $dates=['deleted_at'];
    protected $fillable=['firstName','lastName','age','gender'];

    public function hospitals(){
        return $this->belongsToMany('App\Hospital');
    }
}
