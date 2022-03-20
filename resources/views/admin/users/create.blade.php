@extends('layouts.admin')

@section('content')

    <div class="col-12">

            @include('includes.form_error')

            <h1 class="mb-3">Create User</h1>

            {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true]) !!}

                <div class="form-group mb-3">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null,['class' =>'form-control']) !!}
                </div>

                <div class="form-group mb-3">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', null,['class' =>'form-control']) !!}
                </div>

                <div class="form-group mb-3">
                    {!! Form::label('Select roles: (CTRL + Click multiple)') !!}
                    {!! Form::select('roles[]', $roles,null,['class' =>'form-control','multiple'=>'multiple']) !!}
                </div>

                <div class="form-group mb-3">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),0,['class' =>'form-control']) !!}
                </div>

                <div class="form-group mb-3">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password',['class' =>'form-control']) !!}
                </div>

                <div class="form-group mb-3">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id',null,['class' =>'form-control']) !!}
                </div>

                <div class="form-group mb-3">
                    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}

    </div>

@endsection
