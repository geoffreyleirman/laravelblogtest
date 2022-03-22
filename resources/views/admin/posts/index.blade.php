@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Posts</h1>
                <form>
                    <input type="text" name="search" class="form-control bg-light border-0 small"
                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                </form>
            </div>
        </div>

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
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            <img width="auto" height="62" src="{{$post->photo ? asset($post->photo->file) : 'http://via.placeholder.com/62'}}" alt="{{$post->title}}">
                        </td>
                        <td>{{$post->user ? $post->user->name : 'Username not known'}}</td>
                        <td>
                            @if($post->categories)
                                @foreach($post->categories as $category)
                                    <span class="badge rounded-pill bg-info text-dark">{{$category->name}}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        <td>

                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <div class="mb-2">
                                            <a class="btn btn-info" href="{{route('posts.show', $post->id)}}"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-2">
                                            <a class="btn btn-warning" href="{{route('posts.edit', $post->id)}}"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div>
                                            <a class="btn btn-success ml-1" href="{{route('home.post', $post)}}"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
    </div>
@stop
