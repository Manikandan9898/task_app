<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    protected $table = 'owners_master';
    protected $guarded = [''];
    public $timestamps = false;
}
