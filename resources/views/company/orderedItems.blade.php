@extends('layouts.adm')

@section('title', 'UserDetails')
@section('content')
    <form action="{{route('company.users.search')}}" method="get">
        @csrf
        <div class="input-group mb-3">

            <input type="text" name="search" class="form-control" placeholder="name_user" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">search</button>
        </div>

    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No:</th>
            <th scope="col">Status</th>
            <th scope="col">Item</th>
            <th scope="col">User</th>
            <th scope="col">Chst</th>

        </tr>
        </thead>
        <tbody>
        @for($i =0; $i<count($ordItems); $i++)

            <tr>
                <th  scope="row">{{$i+1}}</th>
                <td>{{$ordItems[$i]->status}}</td>
                <td>{{$ordItems[$i]->item->title}}</td>
                <td>{{$ordItems[$i]->user->name}}</td>
                <td >
                    <form action="{{route('company.confirm.order',$ordItems[$i])}} " method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-outline-info">conf</button>
                    </form></td>

            </tr>
        @endfor

        </tbody>
    </table>


@endsection
