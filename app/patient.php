<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $fillable = ['username', 'password', 'description', 'fullname'];
}
