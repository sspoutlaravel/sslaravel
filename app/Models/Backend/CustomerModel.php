<?php

namespace ShoppingSpout\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    public $timestamps = true;
    protected $primaryKey = 'customer_id';
}
