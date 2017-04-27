<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller{

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */


    
    // protected $username="email";
    // protected $redirectPath = '/home';//登录成功后的跳转方向
    // protected $redirectAfterLogout = '/';//默认退出后的跳转页
    // protected $loginPath='auth/login';//默认登录url

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $username='name';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('guest', ['except' => 'getLogout']);
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    
    //protected $fillable = ['name', 'email' , 'mobile', 'password'];
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'regtime' => time(),
            'password' => bcrypt($data['password']),
        ]);
    }


}
?>