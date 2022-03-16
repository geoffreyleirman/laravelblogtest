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

            <div>{{session('user_message')}}</div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    <h1>Posts</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->photo_id}}</td>
                    <td>{{$post->user ? $post->user->name : 'Username not known'}}</td>
                    <td>{{$post->category ? $post->category->name : 'Category not known'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>{{$post->deleted_at}}</td>
                    <td>
                        @if($post->deleted_at != null)

                            <a class="btn btn-warning" href="{{route('posts.restore', $post->id)}}"><i class="fas fa-trash-restore"></i></a>

                        @else
                            {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminPostsController@destroy', $post->id]]) !!}

                                {{ Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}

                            {!! Form::close() !!}

                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="alert alert-warning">
                    {{session('user_message')}}
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{$posts->links()}}
    </div>
@stop
