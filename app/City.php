<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $table = 'city';
    protected $dates=['deleted_at'];
    protected $fillable = ['name', 'country'];

    public function hospitals()
    {
        return $this->hasMany('App\Hospital');
    }
}
