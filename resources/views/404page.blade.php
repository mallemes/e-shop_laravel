@php
    if(\Illuminate\Support\Facades\Auth::user()->role->name !="user")
        $ext = 'layouts.adm';
    else
        $ext = 'layouts.app';
@endphp

@extends($ext)

@section('content')
         keeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeet
@endsection
