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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">edit role</th>
        </tr>
        </thead>
        <tbody>
        @for($i =0; $i<count($users); $i++)

        <tr>
            <th  scope="row">{{$i+1}}</th>
            <td>{{$users[$i]->name}}</td>
            <td>{{$users[$i]->email}}</td>
            <td>{{$users[$i]->role->name}}</td>
            @can('ban',$users[$i])
            <td>


                <form action="@if($users[$i]->is_active)
                    {{route('company.users.ban',$users[$i]->id)}}
                    @else
                    {{route('company.users.unban',$users[$i]->id)}}
                    @endif
                " method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn {{($users[$i]->is_active ?'btn-danger' : 'btn-success')}}" type="submit" style="width: 40%">
                        @if($users[$i]->is_active)
                            ban
                        @else
                            unban
                        @endif
                    </button>
                </form>

            </td>
            <td >
                <form action="{{route('company.users.update',$users[$i]->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <select  name="role_id" >
                        @foreach($roles as $role)
                            <option @if($role->name == $users[$i]->role->name) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </td>
            @endcan
        </tr>
        @endfor

        </tbody>
    </table>


    <!-- Modal For Edit Status-->






@endsection


{{--<a  class="btn btn-primary" href="{{$users[$i]->id}}" data-toggle="modal" data-target="#exampleModal">--}}
{{--    change--}}
{{--</a>--}}
{{--<!-- Button trigger modal -->--}}
{{--<!-- Modal -->--}}
{{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">{{$users[$i]->name}}</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}

{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <form action="{{route('company.users.update',$users[$i]->id)}}" method="post">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}
{{--                    <select  name="role_id" >--}}
{{--                        @foreach($roles as $role)--}}
{{--                            <option @if($role->name == $users[$i]->role->name) selected @endif value="{{$role->id}}">{{$role->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    --}}{{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
