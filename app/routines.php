<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class routines extends Model
{
    protected $fillable = ['name','series','repetitions','intensity','rest','link', 'day_id','patient_id'];
}
