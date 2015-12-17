<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Socialite;
use Auth;

class AuthController extends Controller
{
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

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    protected $redirectPath ='/';
    protected $redirectAfterLogout ='/home';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

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
            'password' => bcrypt($data['password']),
        ]);
    }

     public function facebookRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookHandleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $userDB = User::where('email', $user->email)->first();

      
        if(is_null($userDB)){
            $userDB = new User();
            $userDB->name = $user->getName();
            $userDB->email = $user->getEmail();
            
            $userDB->save();
        }
        Auth::login($userDB);

        return redirect('/');
    } 

    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $userDB = User::where('email', $user->email)->first();
      
       
        if(is_null($userDB)){
            $userDB = new User();
            $userDB->name = $user->getName();
            $userDB->email = $user->getEmail();
            $userDB->save();
        }
        Auth::login($userDB);

        return redirect('/');
    }

    public function twitterRedirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

     public function twitterHandleProviderCallback()
    {
        $user = Socialite::driver('twitter')->user();
        $userDB = User::where('email', $user->email)->first();
      
       
        if(is_null($userDB)){
            $userDB = new User();
            $userDB->name = $user->getName();
            $userDB->email = $user->getEmail();
            $userDB->save();
        }
        Auth::login($userDB);

        return redirect('/');
    }
}
