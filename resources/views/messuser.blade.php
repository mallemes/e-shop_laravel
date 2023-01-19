@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="{{route('user.message')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <center><h2>{{__('myTexts.message')}}</h2></center>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Admins</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2" name="admin_id">
                            @if($admins != null)
                            @foreach($admins as $admin)
                            <option value="{{$admin->id}}">{{$admin->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{__('myTexts.message')}}</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-info" type="submit">goo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
