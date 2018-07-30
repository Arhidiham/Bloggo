@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->heading }}</div>

                <div class="card-body">
                    <div style="white-space: pre-line">{{ $article->body }}</div>
                </div>
                <div class="card-body">
                    <a href="{{ url('/index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection