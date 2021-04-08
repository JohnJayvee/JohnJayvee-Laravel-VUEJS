<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Support\Facades\Redirect;

class UpdateProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('updateProfile');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)

    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],

        ]);

        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->new_password),

        ]);
        // dd('Password change successfully.');
        // return redirect()->back()->with('message', '✔ Your account has been updated');
            return redirect()->back()->withErrors(['message' => '✔ Your account has been updated']);

    }
}
