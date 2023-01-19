@php
    if(\Illuminate\Support\Facades\Auth::user() != null && \Illuminate\Support\Facades\Auth::user()->role->name !="user")
        $ext = 'layouts.adm';
    else
        $ext = 'layouts.app';
@endphp

@extends($ext)

@section('content')
    <div class="card mb-3" >
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{asset($item->img)}}" class="card-img" alt="..." height="408px" style="width: 19rem">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <h5 class="card-title">PRICE: {{$item->price}} tg</h5>
                    <h5 class="card-title">{{$item->city_id}}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    <p class="card-text"><small class="text-muted">{{$item->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>


    <br>


    <!-- Button trigger modal -->
    @can('buy', $item)
<div class="form-control">
    <form action="{{route('items.buy', $item->id)}}" method="post">
        @csrf
        <label  for="ozu"></label><input  style="width: 10%" type="number" id="ozu" name="ozu" step="4" min="4" max="64" placeholder="ozu">
        <label  for="memories"></label><input  style="width: 10%" type="number" id="memories" name="memory" step="16" min="16" max="512" placeholder="memory">
        <button class="btn btn-outline-info" type="submit">buy</button>
    </form>
    <!-- Modal -->
    <br>
</div>
    @endcan
    @can('create', \App\Models\Comment::class)
    <div class="form-control">
    <form action="{{route('comments.store')}}" method="post">
        @csrf
        <input type="text" name="content">
        <button  name="item_id" value="{{$item->id}}" type="submit" class="btn btn-outline-warning">go comment</button>
    </form>
        </div>
    @endcan
    <br>
    <br>

    @foreach($item->comments as $comment)
<p>--------------------------------------------------------------------------</p>
           <p> User:{{$comment->user->name}} </p>

            <p>{{$comment->content}}</p>
                @can('delete',$comment)
            <form action="{{route('comments.destroy', $comment->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
                @endcan

                @can('update',$comment)
               <a href="{{route('comments.edit', $comment->id)}}"  class="btn btn-info btn sm" >DETAILS</a>
                @endcan



<p>___________________________________________________________________</p>
    @endforeach


@endsection


