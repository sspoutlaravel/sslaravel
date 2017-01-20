<?php

namespace ShoppingSpout\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    protected $table = 'deals_coupons';
    public $timestamps = true;
    protected $primaryKey = 'coupon_id';
}
