<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = ['name','portion', 'day_id','cat_id','patient_id'];
}
