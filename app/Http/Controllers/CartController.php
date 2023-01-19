<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buyAll(){
        $sum = 0;
        $aaa = Auth::user()->itemsWithStatus('in_cart')->get();
        $cartItemsIds = Auth::user()->itemsWithStatus('in_cart')->allRelatedIds();
        if(Auth::user()->money != null){

            foreach ($aaa as $ItemPrice){
                $sum = $sum+$ItemPrice->price;
            }
        }
        if ($sum < Auth::user()->money) {
            foreach ($cartItemsIds as $cartItemId) {
                Auth::user()->itemsWithStatus('in_cart')->updateExistingPivot($cartItemId, ['status' => 'ordered']);
            }
//            Auth::user()->update(['money'=> Auth::user()->money- $sum]);
            return redirect(route('items.index'))->with('message', __('myTexts.buyAll'));
        }
        else{
            return back()->withErrors(__('myTexts.noMoney'));
        }

    }
}
