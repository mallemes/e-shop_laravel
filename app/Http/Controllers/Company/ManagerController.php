<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function addCategoryPage(){
        $this->authorize('create', Category::class);
        $cats = Category::with('items')->get();
        return view('company/addCategory',['cats' => $cats]);
    }
    public function addCategory(Request $request){
        $this->authorize('create', Category::class);
        $val = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:5',

        ]);
        Category::create($val);
        return back();
    }
    public function orderedItems(){
        $w = Message::where('admin_id',Auth::user()->id)->get();
           $orderedItems = Cart::where('status', 'ordered')->with(['item','user'])->get();
        return view('company.orderedItems',['ordItems' => $orderedItems,'mess' =>$w]);
    }
    public function confirmOrder(Cart $cart){
        $this->authorize('isAdmin', User::class);
        $currentUser = $cart->user;
        $currentItem = $cart->item;
        if ($currentUser->money >$currentItem->price) {
            DB::table('users')->where('id',$currentUser->id)->update(['money' => $currentUser->money-$currentItem->price]);
            $cart->update(['status' => 'confirmed']);

            return back()->with('message', __('myTexts.confirmed'));
        }else
            return back()->withErrors(__('mytexts.noMoney'));
    }
}
