<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //

    protected $table = 'vehicle';
    protected $guarded = [''];
    public $timestamps = false;
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    
}
