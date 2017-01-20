<?php

namespace ShoppingSpout\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use ShoppingSpout\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use ShoppingSpout\Models\Backend\AdminUser;


class VerifyTokenController extends Controller
{
    public function __construct(adminUser $adminUser)
    {
        $this->adminUser = $adminUser;
        //$this->middleware('guest', ['except' => 'logout']);
    }
    public function showTokenForm() {
        //echo env('DB_DATABASE');
        //dd(Session::all());
        return view('backend.verify-token');
    }
    
    public function submitToken(Request $request) {
        
       $verify_token = $request->input('verify_token');        
       $id = Auth::guard('admin_user')->User()->admin_user_id;
       $adminUser = AdminUser::find($id);
       
       if(strcmp($verify_token, $adminUser->sms_code) == 0){          
          $adminUser->fill(['is_login' => encrypt(str_random(6))]);
          $adminUser->save();
          
          return redirect('admin/dashboard');
       } else {
           return redirect()->back()
            ->withInput($request->only($verify_token, 'verify_token'))
            ->withErrors([
                'verify_token' => 'Invalid Token',
            ]);
            //return redirect('/verify_token');    
       }
       
    }
    
}