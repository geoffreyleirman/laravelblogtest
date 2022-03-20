@extends('layouts.admin')
@section('content')
    <div class="col-12">
        @if(session('category_message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info!</strong>  {{session('category_message')}}
            </div>
        @endif
        <h1 class="mb-3">Post Categories</h1>
        <table class="table table-striped shadow-lg p-3 mb-5 bg-body rounded table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-warning" href="{{route('postcategories.edit', $category->id)}}"><i class="fas fa-edit"></i></a>
                            <form action="{{route('postcategories.destroy', $category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="alert alert-warning">
                        {{session('user_message')}}l
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$categories->links()}}
        </div>
    </div>
@stop
