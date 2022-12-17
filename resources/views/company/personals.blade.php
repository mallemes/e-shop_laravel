@extends('layouts.adm')

@section('title', 'Personals')
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">edit Role</th>
        </tr>
        </thead>
        <tbody>

            <tr style="background-color: #1c294e">
                <th style="background-color: #1c294e" scope="row">you acc:</th>
                <td style="background-color: #1c294e">{{$myAcc->name}}</td>
                <td style="background-color: #1c294e">{{$myAcc->email}}</td>
                <td style="background-color: #1c294e">{{$myAcc->role->name}}</td>
                <td style="background-color: #1c294e"></td>
                <td style="background-color: #1c294e"><a href="{{route('user.profile')}}">profile</a></td>

            </tr>
            @for($i =0; $i<count($personals); $i++)
            <tr>
                <th  scope="row">{{$i+1}}</th>
                <td>{{$personals[$i]->name}}</td>
                <td>{{$personals[$i]->email}}</td>
                <td>{{$personals[$i]->role->name}}</td>

                <td>
                    @can('ban',$personals[$i])
                    <form action="@if($personals[$i]->is_active)
                    {{route('company.users.ban',$personals[$i]->id)}}
                    @else
                    {{route('company.users.unban',$personals[$i]->id)}}
                    @endif
                " method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn {{($personals[$i]->is_active ?'btn-danger' : 'btn-success')}}" type="submit" style="width: 40%">
                            @if($personals[$i]->is_active)
                                ban
                            @else
                                unban
                            @endif
                        </button>
                    </form>

                </td>
                <td><form action="{{route('company.users.update',$personals[$i]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <select  name="role_id" >
                            @foreach($roles as $role)

                                <option @if($role->name == $personals[$i]->role->name) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                        </select>

                        <button type="submit">edit</button>
                    </form>
                    @endcan
                </td>

            </tr>
        @endfor

        </tbody>
    </table>

@endsection

