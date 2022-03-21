@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Post</h1>
        @include('includes.form_error')
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control mt-2" placeholder="Title...">
            </div>
            <div class="form-group mb-3">
                <label for="category">Category (CTRL + CLICK multiple select)</label>
                <select name="categories[]" class="form-control mt-2 custom-select" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <textarea class="form-control" name="body" id="body" cols="100%" rows="10" placeholder="Description..."></textarea>
            </div>
            <div class="form-group mb-3">
                <input type="file" name="photo_id" id="ChooseFile">
            </div>
            <button type="submit" class="btn btn-primary">Add Post</button>
        </form>
    </div>

@endsection
