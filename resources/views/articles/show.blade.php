@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title">{{ $article->title }}</h2>
            <p class="card-text">{{ $article->content }}</p>
            <p class="text-muted">By {{ $article->author ?? 'Unknown' }} | {{ $article->created_at->toFormattedDateString() }}</p>
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
