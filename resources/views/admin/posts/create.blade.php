@extends('layouts.admin')

@section('content')

    <div class="col-12">

        @include('includes.form_error')

            <h1 class="mb-3">Create Post</h1>

            {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminPostsController@store', 'files'=>true]) !!}

                <!--Photo-->
                <div class="form-group mb-3">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id',null,['class' =>'form-control']) !!}
                </div>

                <!--Owner-->
                <div class="form-group mb-3">
                    {!! Form::label('name', 'Owner:') !!}
                    {!! Form::text('name', null,['class' =>'form-control']) !!}
                </div>

                <!--Category-->
                <div class="form-group mb-3">
                    {!! Form::label('Select categories: (CTRL + Click multiple)') !!}
                    {{--{!! Form::select('categories[]', $categories,null,['class' =>'form-control','multiple'=>'multiple']) !!}--}}
                </div>

                <!--Title-->
                <div class="form-group mb-3">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null,['class' =>'form-control']) !!}
                </div>

                <!--Body-->
                <div class="form-group mb-3">
                    {!! Form::label('body', 'Body:') !!}
                    {!! Form::text('body', null,['class' =>'form-control']) !!}
                </div>

                <!--Create Button-->
                <div class="form-group mb-3">
                    {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}

    </div>

@stop
