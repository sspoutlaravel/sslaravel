<?php

namespace ShoppingSpout\Models\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    protected $table = 'admin_users';
    //protected $connection = 'shoppingspout_uk'; 

    protected $primaryKey = 'admin_user_id'; // or null

    public $incrementing = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'sms_code', 'is_login',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','sms_code','is_login',
    ];
    
    
}
