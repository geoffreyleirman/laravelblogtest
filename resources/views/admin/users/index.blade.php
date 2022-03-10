@extends('layouts.admin')

@section('content')

    <div class="col-12">
        @if(Session::has('user_message'))
            <p class="alert alert-info">{{session('user_message')}}</p>
        @endif
    </div>

    <h1>Users</h1>

    <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Active</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Deleted</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Location</th>
                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>

                        <td>
                            <img src="{{$user->photo ? asset($user->photo->file): 'http://via.placeholder.com/62'}}"
                                 alt="{{$user->name}}"
                                 height="62"
                                 width="auto">
                        </td>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge rounded-pill bg-info text-dark">{{$role->name}}</span>
                            @endforeach
                        </td>

                        <td>{{$user->is_active ? 'Active' : 'Not Active'}}</td>

                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>

                        <td>{{$user->deleted_at}}</td>

                        <td>
                            @if($user->deleted_at != null)

                                <a class="btn btn-warning" href="{{route('users.restore', $user->id)}}"><i class="fas fa-trash-restore"></i></a>

                                @else
                                {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}

                                    {{ Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                                {!! Form::close() !!}

                            @endif
                        </td>

                        <td>{{$user->photo ? $user->photo->file : 'no existing location'}}</td>
                    </tr>

                @endforeach

            </tbody>

    </table>

    {{$users->links()}}

@endsection
