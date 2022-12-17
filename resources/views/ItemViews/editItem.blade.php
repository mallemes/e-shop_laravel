@extends('layouts.adm')

@section('content')
    <form action="{{route('items.update', $item->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-6 mx-auto">
            <h1 class="text-center">
                Details Item
            </h1>
            <div class="row mt-3">
                <div class="col-6">
                    <label>TITLE: </label>
                </div>
            </div>
            <div class="col">
                <input type="text" name="title" value="{{$item->title}}" >
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>PHOTO: </label>
                </div>
            </div>
            <div class="col">
                <input type="file" name="img" value="{{$item->img}}" >
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>PRISE($): </label>
                </div>
            </div>
            <div class="col">
                <input type="number" name="price" value="{{$item->price}}" >
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>DESCRIPTION: </label>
                </div>
            </div>
            <div class="col">
                <input type="text" name="description" value="{{$item->description}}" >

            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <label>CATEGORY: </label>
                </div>
            </div>
            <div class="col">
                <select name="category_id" >
                    @foreach($categories as $cat)

                        <option @if($cat->id == $item->category_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button class="btn btn-success">Save </button>
        </div>
    </form>



@endsection

