@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1 class="mb-3">Create Category</h1>
        @include('includes.form_error')
        <form action="{{route('postcategories.store')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Category...">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
        </form>
    </div>
@endsection
