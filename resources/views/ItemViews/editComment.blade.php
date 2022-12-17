@extends('layouts.app')

@section('content')
    <form action="{{route('comments.update', $comment->id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="col-6 mx-auto">
            <h1 class="text-center">
                Edit comment
            </h1>
            <div class="row mt-3">
                <div class="col-6">
                    <label>Content: </label>
                </div>
            </div>
            <div class="col">
                <input type="text" name="content" value="{{$comment->content}}" >
            </div>


            <button class="btn btn-success">Save </button>
        </div>
    </form>



@endsection


