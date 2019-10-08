<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recipes extends Model
{
    protected $fillable = ['name', 'ingredients', 'procedures', 'patient_id'];
}
