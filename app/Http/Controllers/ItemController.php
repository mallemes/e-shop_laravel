<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Item;
use App\Models\Message;
use App\Models\User;
use App\Policies\ItemPolicy;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function buyItem(Item $item,Request $request){
        $this->authorize('buy', Item::class);
        $request->validate(['memory' =>'numeric|required', 'ozu'=> 'numeric|required']);
        $q =Auth::user()->itemsWithStatus('in_cart')->where('item_id',$item->id)->first();
        if ($q != null){
            Auth::user()->itemsWithStatus('in_cart')->updateExistingPivot($item->id , ['memory' => $q->pivot->count+$request->input('memory')]);
        }else {
            Auth::user()->itemsWithStatus('in_cart')->attach($item->id, ['ozu' => $request->input('ozu'), 'memory' => $request->input('memory')]);
        }
        return back()->with('message', __('myTexts.addItemToCart'));
    }
    public function cart(){
        return view('ItemViews.cartItems',['cartItems'=>Auth::user()->itemsWithStatusCart]);
    }

    public function postsByCategory(Category $category){
        return view('ItemViews.index' , [ 'categories' =>[$category], 'itemsSort'=> $category->items]);
    }
    public function index(Request $request)
    {
        $categories = Category::with('items')->get();
       // $allItems = Item::with('comments')->get();
//        $itemsSort = DB::table('items')
//            ->orderBy('id', 'asc')
//            ->get();
//        if ($request->search){
//            $categories =Item::where('title','LIKE', '%'.$request->search.'%')->with('user')->get();
//        }
//        else
//        $w = Auth::user()->userAdminMess()->get();
            $categories = Category::with('items')->get();
        $w = Message::where('admin_id',Auth::user()->id)->get();
        return view('ItemViews.index',[ 'categories' =>$categories, 'mess' => $w]);

    }


    public function create()
    {
        $w = Message::where('admin_id',Auth::user()->id)->get();
        $this->authorize('create',Item::class);
        return view('ItemViews.createItem',['categories' =>Category::all(), 'mess' => $w]);

    }

    public function store(Request $request)
    {
        $this->authorize('create',Item::class);
       $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric|integer|digits_between:1,100000',
            'description' =>'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'img' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
       $fileName = time().$request->file('img')->getClientOriginalName();
       $img_path = $request->file('img')->storeAs('itemsImg', $fileName, 'public');
       $validated['img'] = '/storage/'.$img_path;
        //Item::create($validated + ['user_id' =>Auth::user()->id]);
        Auth::user()->items()->create($validated);
        return redirect()->route('items.indexes')->with('message', __('myTexts.addItem'));

    }


    public function show(Item $item)
    {
        $w = Message::where('admin_id',Auth::user()->id)->get();
        $item->load('comments.user');
       // $comments = $item->comments;
        return view('ItemViews.showItem', ['item' => $item, 'mess' => $w]);
    }

    public function edit(Item $item)
    {
        $w = Message::where('admin_id',Auth::user()->id)->get();
        $this->authorize('create',Item::class);
        return view('ItemViews.editItem', ['item' =>$item,'categories' =>Category::all(), 'mess' => $w]);

    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric|integer|digits_between:1,100000',
            'description' =>'required',
            'img' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id',

        ]);
        $fileName = time().$request->file('img')->getClientOriginalName();
        $img_path = $request->file('img')->storeAs('itemsImg', $fileName, 'public');
        $validated['img'] = '/storage/'.$img_path;
        $item->update($validated);
        return redirect()->route('items.indexes')->with('message', __('myTexts.editItem'));
    }

    public function destroy(Item $item)
    {

        $this->authorize('delete',$item);
        $item->delete();
        return redirect()->route('items.indexes')->withErrors(__('myTexts.delItem'));

    }
    public function destroyCart(Item $item){

        $s =Auth::user()->itemsWithStatus('in_cart')->where('item_id', $item->id)->first();
        if ($s != null )
            Auth::user()->itemsWithStatus('in_cart')->detach($item->id);
        return redirect()->route('items.cart')->withErrors(__('myTexts.delItemInCart'));
    }

}
