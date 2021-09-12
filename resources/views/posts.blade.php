@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">author name</th>
                <th scope="col">title</th>
                <th scope="col">body</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($posts))
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop