<?php

namespace App\Http\Controllers\auth2;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function create(){
        return view('auth.register');
    }
    public function register(Request $request){
        $w = $request->input('name');
        $s = $w.__('myTexts.newUser');
       $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:4|confirmed',
            'avatar' => 'mimes:jpg,png,jpeg,gif|max:2048',
        ]);
       if($request->file('avatar') != null) {
           $fileName = time() . $request->file('avatar')->getClientOriginalName();
           $img_path = $request->file('avatar')->storeAs('avatar', $fileName, 'public');
           $validated['avatar'] = '/storage/' . $img_path;
       }
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('user.profile')->with('message',$s);
    }
}
