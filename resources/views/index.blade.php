@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Heading</th>
                <th>Body</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->heading }}</td>
                    @if (strlen($article->body) <= 50) 
                        <td>{{ $article->body }}</td>
                    @else
                        <td>{{ substr($article->body, 0, 50) . '...' }}</td>
                    @endif
                    <td><a href="{{ action('ArticleViewController@get', $article->id) }}" class="btn btn-primary">Read</a></td>
                    @if (Route::has('login'))
                        @auth
                            <td><a href="{{ action('ArticleController@edit', $article->id) }}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{ action('ArticleController@destroy', $article->id) }}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        @else
                            <td colspan="2"></td>
                        @endauth
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (Route::has('login'))
        @auth
            <div class="card-body">
                <a href="{{ url('/add') }}" class="btn btn-primary">Create</a>
            </div>
        @endauth
    @endif
</div>
@endsection