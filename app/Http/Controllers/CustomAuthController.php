<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function signup() {
        return view("auth.signup");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'UserName' => 'required|unique:users,UserName',
            'FirstName' => 'required',
            'LastName' => 'required',
            'Role' => 'required',
            'Email' => 'required|Email|unique:users,Email',
            'Password' => 'required|min:5|max:15',
        ]);
    
        $user = new User();
        $user->UserName = $request->UserName;
        $user->FirstName = $request->FirstName;
        $user->LastName = $request->LastName;
        $user->Role = $request->Role;
        $user->Email = $request->Email;
        $user->Password = Hash::make($request->Password); // ✅ Hash the password before saving
    
        if ($user->save()) {
            return back()->with('success', 'You have Registered!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function loginUser(Request $request) {
        $request->validate([
            'loginInput' => 'required',
            'Password' => 'required|min:5|max:15',
        ]);
    
        $loginInput = $request->loginInput;
        $password = $request->Password;
    
        // Check if input is an Email or Username
        $fieldType = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'Email' : 'UserName';
    
        $user = User::where($fieldType, $loginInput)->first();
    
        if (!$user) {
            return back()->with('fail', 'The Username or Email is not registered!');
        }
    
        // Verify password
        if (!Hash::check($password, $user->Password)) {
            return back()->with('fail', 'Incorrect password!');
        }
    
        // Authenticate the user
        Auth::login($user);
    
        // Redirect based on Role
        if ($user->Role === 'farmer') {
            return redirect()->route('farmer.dashboard')->with('Success', 'Welcome, Farmer!');
        } elseif ($user->Role === 'investor') {
            return redirect()->route('investor.dashboard')->with('Success', 'Welcome, Investor!');
        } else {
            return redirect()->route('home')->with('Success', 'Login successful!');
        }
    }
    public function farmers()  {
        return view('pages.farmers');
    }

    public function investors()  {
        return view('pages.investors');
    }
}    