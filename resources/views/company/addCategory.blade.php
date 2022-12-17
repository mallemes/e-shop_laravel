@extends('layouts.adm')

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
    <div class="row">
        @foreach($cats as $cat)
           <div class="col-3"> <a href="">{{$cat->name}}</a></div>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="{{route('company.manager.addcat')}}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-6">
                            <label>NAME: </label>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="name" required placeholder="Name">
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label>Code:(max: 5 symbols) </label>
                        </div>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="code" required placeholder="Code">
                    </div>
                    <div class="form-group">
                            <button class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
