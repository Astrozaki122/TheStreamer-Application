<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AccountController extends Controller
{
    public function showlogin() {
        return view('login');
    }

    public function showregister(){
        return view('register');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/mainpage');
        }

        return back()->withErrors([
            'username' => 'Invalid login details',
        ]);
    }

    public function register(Request $request){
    $validatedData = $request->validate([
        'username' => 'required|unique:accounts|max:255', 
        'password' => 'required|min:8',
    ]);

    Account::create([
        'username' => $validatedData['username'],
        'password' => bcrypt($validatedData['password']), // ✅ hash password
    ]);

    return redirect('/login');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

}
