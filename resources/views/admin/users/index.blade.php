@extends('layouts.admin')

@section('content')

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
                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->photo_id}}</td>
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
                    </tr>

                @endforeach

            </tbody>

    </table>

    {{$users->links()}}

@endsection
