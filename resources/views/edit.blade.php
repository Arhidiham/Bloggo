@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="{{ action('ArticleController@update', $id) }}">
                @csrf
                <div class="card">
                    <div class="card-header">Edit an Article</div>
    
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="heading">Heading:</label>
                                <input type="text" class="form-control" id="heading" name="heading" value="{{ $article->heading }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="body">Body:</label>
                                <textarea class="form-control" id="body" name="body" rows="8">{{ trim($article->body) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ url('/index') }}" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
