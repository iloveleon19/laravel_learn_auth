<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Levels extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
