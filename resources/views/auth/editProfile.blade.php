@extends('layouts.app')

@section('content')
    <form action="{{route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="col-6 mx-auto">
            <h1 class="text-center">
                Change profile
            </h1>
            <div class="row mt-3">
                <div class="col-6">
                    <label>Name: </label>
                </div>
            </div>
            <div class="col">
                <input type="text" name="name" value="{{$user->name}}" >
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>email: </label>
                </div>
            </div>
            <div class="col">
                <input type="text" name="email" value="{{$user->email}}" >
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>Avatar: </label>
                </div>
            </div>
            <div class="col">
                <input type="file" name="avatar">
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label>PHONE NUMBER: </label>
                </div>
            </div>
            <div class="col">
                <input type="number" name="number" @if($user->number !=null) value="{{$user->number}}" @else value="null" @endif   >
            </div>

            <button class="btn btn-success" type="submit">Save </button>
        </div>
    </form>



@endsection


