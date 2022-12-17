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
    <div class="container">
        <div class="row">
            <div class="col-3">
                <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-6">
                            <label>NAME: </label>
                        </div>
                    </div>
                    <div class="col">
                        <label>
                            <input type="text" class="form-control" name="title"  placeholder="Name">
                        </label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label>PRICE: </label>
                        </div>
                    </div>
                    <div class="col">
                        <label>
                            <input type="number" class="form-control" name="price"  placeholder="Price">
                        </label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label>DESCRIPTION: </label>
                        </div>
                    </div>
                    <div class="col">
                        <label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                   name="description" required placeholder="Description">
                        </label>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label>Image: </label>
                        </div>
                    </div>
                    <div class="col">
                        <label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" name="img"
                                   required placeholder="img">
                        </label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <label>CATEGORY: </label>
                        </div>
                    </div>
                    <div class="col">
                        <label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $cat)

                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success">Save changes</button>
                        </div>
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
