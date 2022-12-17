<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function indexxx()
    {
        $categories = Category::all();
        $itemsSort = Item::with('user')->get();
        return view('home',[ 'categories' =>$categories, 'itemsSort'=> $itemsSort]);

    }
}
