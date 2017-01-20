<?php

namespace ShoppingSpout\Http\Controllers\Backend\Auth;

use ShoppingSpout\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use ShoppingSpout\Models\Backend\AdminUser as AdminUser;

class LoginController extends Controller 
{
    /*
    |--------------------------------------------------------------------------
    | Admin Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        //$this->middleware('guest', ['except' => 'logout']);
    }
    
     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('admin_user')->check()) {
            return redirect('admin/dashboard');
        }else{
            return view('backend.login');
        }

    }
    
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function adminLogin(Request $request)
    {
        
         $dbconnection = $request->input('domain');
        //set connection used
       // Config::set('database.default', $dbconnection);
        
        //dd(Config::get('database.default'));
        
        //if($request->isMethod('post')){
            
        //}
        
      
       
       //  working method  
       if(Auth::guard('admin_user')->attempt(['email' => $request->email, 'password' => $request->password])){
          
          $smsCode = str_random(6);
          $id =  Auth::guard('admin_user')->User()->admin_user_id;
          $adminUser = AdminUser::find($id);
          $adminUser->fill(['sms_code' => $smsCode]);
          $adminUser->save();
          
          //SMS sending code
          
          
          //End of SMS sending code
          
            return redirect()->intended('admin/verifytoken'); 
        }
       
        
        return $this->sendFailedLoginResponse($request);
    }
    
    
    
    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $id =  Auth::guard('admin_user')->User()->admin_user_id;
        $adminUser = AdminUser::find($id);
        $adminUser->fill(['sms_code' => '']);
        $adminUser->fill(['is_login' => '']);
        $adminUser->save();
        
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect('admin/login');
    }
    
     protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => \Lang::get('auth.failed'),
            ]);
    }
    
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin_user');
    }
    
    
}

