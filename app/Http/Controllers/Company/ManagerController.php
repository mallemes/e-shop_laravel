<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;

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
           $orderedItems = Cart::where('status', 'ordered')->with(['item','user'])->get();
        return view('company.orderedItems',['ordItems' => $orderedItems]);
    }
}
