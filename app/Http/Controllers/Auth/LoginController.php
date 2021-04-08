<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**

     * Create a new controller instance.

     *

     * @return void

     */
    // custom username
public function username()
    {
        return 'username'; //or whatever field
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (auth()->validate(array($fieldType => $request->username, 'password' => $request->password))) {
            if (Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
                return response()->json(array('route'=>route('home')));
            }
        } else {
            $errors = [$this->username() => 'Invalid account.'];
			return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors($errors);
        }
    }

}
