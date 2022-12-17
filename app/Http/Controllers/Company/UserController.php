<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        $this->authorize('viewAny',User::class);
        $users = null;
        $roles = Role::whereNotIn('name', ['admin'])->get();

        if ($request->search){
            $users =User::where('name','LIKE', '%'.$request->search.'%')->
            orWhere('email','LIKE', '%'.$request->search.'%')->with('role')->get();
        }
        else{

            $users = User::whereNotIn('role_id',[2,3])->with('role')->get();

        }

        return view('company/changesUsers',['users'=> $users,'roles' =>$roles]);
    }
    public function ban(User $user){
        $this->authorize('ban', $user);
        $user->update([
            'is_active'=> false,
        ]);
        return redirect()->back();

    }
    public function unban(User $user){
        $this->authorize('ban', $user);
        $user->update([
            'is_active'=> true,
        ]);
        return redirect()->back();
    }
    public function personals(){
        $this->authorize('viewAny',User::class);
        $personals = User::whereNotIn("role_id",[1])->whereNotIn('id',[Auth::user()->id])->with('role')->get();
        $roles = Role::whereNotIn('name',['admin'])->get();

        return view('company/personals',['personals'=> $personals,'roles' =>$roles,'myAcc'=>Auth::user()]);
    }
    public function edit(User $user){
        $user = User::findOrFail('id');
        return view('company/changesUsers', compact('user'));

    }
    public function update(User $user, Request $request){
        $this->authorize('ban', $user);
        $validated = $request->validate([
            'role_id' => 'required|numeric|exists:roles,id',
        ]);
        $user->update($validated);
        return back();
    }
}
