<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'title', 'discount', 'action_type', 'active', 'is_indefinitely', 'is_auto_apply_checkout',
    ];

    public function createdBy() {
        return $this->belongsTo('App\Manager', 'created_id', 'id');
    }

    public function actionType() {
        return $this->belongsTo('App\Action', 'action_type', 'type');
    }

    /**
     * translate active to yes、No
     *
     * @param  boolean  $value
     * @return string
     */
    public function getActiveAttribute(int $value)
    {
        return $value==true ? "Yes" : "No";
    }

    /**
     * translate is_indefinitely to yes、No
     *
     * @param  boolean  $value
     * @return string
     */
    public function getIsIndefinitelyAttribute(bool $value)
    {
        return $value==true ? "Yes" : "No";
    }

    /**
     * translate is_auto_apply_checkout to yes、No
     *
     * @param  boolean  $value
     * @return string
     */
    public function getIsAutoApplyCheckoutAttribute(bool $value)
    {
        return $value==true ? "Yes" : "No";
    }

    public function getMytestAttribute()
    {
        return 'my test';
    }
}
