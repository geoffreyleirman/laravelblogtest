@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Edit Category</h1>
        @include('includes.form_error')
        <form action="{{route('postcategories.update', $category->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Category...">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
        </form>
    </div>
@endsection
