<?php

namespace App\Http\Controllers\auth2;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function login(Request $request){

        if(Auth::check()){
            return redirect()->intended('/profile');
        }
         $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'

        ]);
       if ( Auth::attempt($validated)){
           if(Auth::user()->role->name == "admin"){
               return redirect()->route('company.index');
           }else
           return redirect()->intended('/profile')->with('message',' kow keldiniz!');
       }
       return back()->withErrors('katelik');
    }

    public function logout(){
        $s = Auth::user()->name;
        $x = $s." WYgyp ketti";
        Auth::logout();

        return redirect()->route('items.index')->withErrors($x);
    }
    public function profile(){
        $user = Auth::user();
        return view('auth.profile',['user'=>$user]);
    }
    public function edit(User $user){
        $this->authorize('update',$user);
        return view('auth.editProfile',['user'=>$user]);
    }
    public function update(Request $request, User $user){
        $this->authorize('update',$user);
        $validated = $request->validate([
            'name' => 'max:255',
            'email' => 'email',
            'number' => 'numeric',
            'avatar' => 'mimes:png,jpg,jpeg, gif|max:2048',

        ]);
        if($request->file('avatar') != null) {
            $fileName = time() . $request->file('avatar')->getClientOriginalName();
            $img_path = $request->file('avatar')->storeAs('avatar', $fileName, 'public');
            $validated['avatar'] = '/storage/' . $img_path;
        }
        $user->update($validated);
        return redirect()->route('user.profile')->with('message', 'Profile Updated');

    }
}
