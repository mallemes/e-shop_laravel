
@php
    if(\Illuminate\Support\Facades\Auth::user()->role->name !="user")
        $ext = 'layouts.adm';
    else
        $ext = 'layouts.app';
@endphp

@extends($ext)
@section('content')
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <button class="btn btn-secondary"><img src="{{asset($user->avatar)}}" height="100" width="100"/>
                </button>
               <h4> <span class="name mt-3">name: {{$user->name}}</span></h4>
                <h5> <span class="idd">email: {{$user->email}}</span></h5>
                <h5> @if($user->number!=null)<div class="d-flex flex-row justify-content-center align-items-center gap-2"><span class="idd1">Phone number: {{$user->number}}</span>@endif </h5>
                    <span><i class="fa fa-copy"></i></span></div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                      <button class="btn btn-dark">
                    <a href="{{route('profile.edit',Auth::user())}}">Edit Profile</a>
                    </button></div>



                <div class="text mt-3"><span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span>
                </div>
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"><span><i
                            class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i
                            class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span></div>
                <div class=" px-2 rounded mt-4 date "><span class="join">Joined: {{$user->created_at}}</span></div>
            </div>
        </div>


@endsection



