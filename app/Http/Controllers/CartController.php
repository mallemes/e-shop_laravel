<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buyAll(){
        $cartItemsIds = Auth::user()->itemsWithStatus('in_cart')->allRelatedIds();
        foreach ($cartItemsIds as $cartItemId){
            Auth::user()->itemsWithStatus('in_cart')->updateExistingPivot($cartItemId,['status'=> 'ordered']);
        }
        return redirect(route('items.index'));
    }
}
