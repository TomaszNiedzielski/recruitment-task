<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
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
    </body>
</html>
