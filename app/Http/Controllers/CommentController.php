<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function store(Request $request)
    {
        $this->authorize('create',Comment::class);
        $validated = $request->validate([

            'content' =>'required',
            'item_id' => 'required|exists:items,id',
        ]);

        Comment::create($validated + ['user_id' => Auth::user()->id]);
        //Auth::user()->comments()->create($validated);

        return back()->with('message','comment jazyldy');
    }




    public function edit(Comment $comment)
    {
        $this->authorize('update',$comment);
            return view('ItemViews.editComment', ['comment' => $comment]);
    }


    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update',$comment);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('items.show',['item' => $comment->item_id])->with('message', 'comment ozgerdi');
    }


    public function destroy(Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return back()->withErrors('comment joiyldy');
    }
}
