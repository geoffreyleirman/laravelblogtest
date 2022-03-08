@extends('layouts.admin')

@section('content')

    <h1>Photos</h1>

    <table class="table table-striped">

        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">File</th>

            <th scope="col">Created</th>
            <th scope="col">Updated</th>

        </tr>
        </thead>

        <tbody>

        @foreach($photos as $photo)

            <tr>
                <td>{{$photo->id}}</td>

                <td>
                    <img src="{{$photo->file ? asset($photo->file): 'http://via.placeholder.com/62'}}"
                         alt="{{$photo->file}}"
                         height="62"
                         width="auto">
                </td>

                <td>{{$photo->file}}</td>

                <td>{{$photo->created_at->diffForHumans()}}</td>
                <td>{{$photo->updated_at->diffForHumans()}}</td>

            </tr>

        @endforeach

        </tbody>

    </table>

@endsection
