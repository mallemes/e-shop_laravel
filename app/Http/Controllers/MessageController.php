<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index(){
        return view('messuser',['admins' => User::where('role_id' ,3)->get()]);
    }
    public function messageToAdmin(Request $request){
      $request->validate(['message' => 'required|max:400','admin_id' => 'required|numeric|exists:users,id']);
        Auth::user()->adminUserMess()->attach($request->input('admin_id'),[

            'message' =>$request->input('message')]);
    return back()->with('message', 'message sent');
    }
//    public function adminMessages(){
//        $w = Auth::user()->adminUserMess()->get();
//        return redirect(route('company.index'),['mess' => $w]);
//    }

    public function delAdminMess(Message $message){
        $message->delete();
        return back();
    }
    public function messToUser(Request $request, User $user){
        $request->validate(['message' => 'required|max:400']);
        Auth::user()->adminUserMess()->attach($user,['message' => $request->input('message')]);
        return back()->with('message', 'message sent');

    }
    public function delUserMess(Message $message){
        $message->delete();
        return back();
    }
}
