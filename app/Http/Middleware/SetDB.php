<?php

namespace ShoppingSpout\Http\Middleware;

use Cookie;
use Config;
use Closure;
use DB;
use ShoppingSpout\Models\Backend\AdminUser;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;

class SetDB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin_user')
    {
       
        
        
        /*if($request->has('domain') || $request->session()->has('domain')){
            //if($request->has('auth_token')){
                //$token=$request->get('auth_token');
                $user_data = DB::connection($dbconnection)->table('admin_users')->select('id','password')->where("email",$request->input('email'))->get();
                DB::disconnect(env('DB_DATABASE'));
                if($user_data == null ) {
                    Auth::logout();
                    Session::flush();
                    return redirect('/admin_login');
                }else{
                    $id = $user_data[0]->id;
                    $password = $user_data[0]->password;
                    if(!empty($password)){
                        if (Hash::check($request->input('password'), $password)) {           
                            DB::disconnect(env('DB_DATABASE'));
                            $user= AdminUser::findorfail($id);
                            //dd($user);
                            Auth::login($user);
                            //Session::put('token',$token);
                            Session::put('DB_DATABASE',$dbconnection);
                            //Session::put('site',$result->paths);
                            Session::put('admin_token',  encrypt('654321'));
                            return redirect()->intended('admin_verifytoken');

                        }else{
                            return redirect('/admin_login');
                        }
                    }else{
                         return redirect('/admin_login');
                    }
                }
            }
            if(Session::has('DB_DATABASE')) {

                Config::set('database.connections.shoppingspout_us', array(
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'database' =>Session::get('DB_DATABASE'),

                    'username' => 'root',

                    'password' => '',

                    'charset' => 'utf8',

                    'collation' => 'utf8_unicode_ci',

                    'prefix' => ''

                ));

                DB::reconnect('shoppingspout_us');
                return redirect('/admin_login');
            }else{
                Auth::logout();
                Session::flush();
                return redirect('/admin_login');
            }

        */
       /* 
        
      if($request->has('domain') || $request->session()->has('domain')){
            
            $dbconnection = $request->input('domain');
            //echo $dbconnection;
            //$token = $request->get('_token');
            DB::disconnect(env('DB_DATABASE'));
            DB::reconnect($dbconnection);
            $user_data = DB::connection($dbconnection)->table('admin_users')->select('id','password')->where("email",$request->input('email'))->get();
            //DB::enableQueryLog();
            //print_r(DB::getQueryLog());
            //print_r($user_data);exit;
            $id = $user_data[0]->id;
            $password = $user_data[0]->password;
            
            if(!empty($password)){
                if (Hash::check($request->input('password'), $password)) {
                    //DB::reconnect($dbconnection);
                    $user= AdminUser::findorfail($id);
                    //dd($user);
                    Auth::guard('admin_user')->login($user);
                    //Session::put('_token',$token);
                    Session::put('DB_DATABASE',$dbconnection);
                    Config::set('database.connections'.Session::get('DB_DATABASE'));
                    
                    //Session::put('site',$result->paths);
                    // Session::put('admin_token',  encrypt('654321'));
                    return redirect()->intended('admin/verifytoken');
                    
                }
            }else{
                return $next($request);
            }            
        }
        
        //dd(Session::all());
        
        /*if(Session::has('DB_DATABASE')) {
                Config::set('database.connections'.Session::get('DB_DATABASE'));
                DB::reconnect(Session::get('DB_DATABASE'));
                return $next($request);
        }else{
                Auth::guard('admin_user')->logout();
                //Session::flush();
                //return redirect('/admin_logout');
        }*/

        
        
        
//Session::get('admin_token')
        
        
        return $next($request);
    }
}
