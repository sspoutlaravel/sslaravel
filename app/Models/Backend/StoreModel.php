<?php

namespace ShoppingSpout\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{

    protected $table = 'stores';
    public $timestamps = true;
    protected $primaryKey = 'store_id';

}
