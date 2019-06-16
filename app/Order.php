<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function createdBy() {
        dump($this);
        if ($this->price<0) {
            return $this->belongsTo('App\Manager','created_by','id');
        } else {
            return $this->belongsTo('App\User','created_by','id');
        }
    }
}
