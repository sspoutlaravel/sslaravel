<?php

namespace ShoppingSpout\Http\Controllers\Backend;

use Illuminate\Http\Request;
use ShoppingSpout\Http\Controllers\Controller;
use ShoppingSpout\Models\Backend\CategoryModel as Category;
use ShoppingSpout\Models\Backend\StoreModel as Store;
use ShoppingSpout\Models\Backend\CouponModel as Coupon;
use ShoppingSpout\Models\Backend\CustomerModel as Customer;

class DashboardController extends Controller
{
    
    public function __construct() {
       $this->middleware('admin.user');
    }


    /**
     * load dashboard with statistics.
     *
     * @param None
     * @return array()
     */
    public function index(){

        $dashboard_data = array();

        //get total categories
        $dashboard_data['total_categories'] = Category::count();

        //get total stores
        $dashboard_data['total_stores'] = Store::count();

        //get total coupons
        $dashboard_data['total_coupons'] = Coupon::count();

        //get total customers
        $dashboard_data['total_customers'] = Customer::count();

        return view('backend.dashboard', compact('dashboard_data'));
    }
}
