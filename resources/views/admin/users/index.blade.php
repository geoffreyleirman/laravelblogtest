@extends('layouts.admin')

@section('content')


        @if(Session::has('user_message'))

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
            </svg>

            <div class="alert alert-info alert-dismissible fade show d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>

                <p>{{session('user_message')}}</p>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif


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
