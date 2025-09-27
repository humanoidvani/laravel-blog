@extends('layout')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2>Edit Article</h2>
            <form action="{{ route('articles.update', $article) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" rows="6" class="form-control" required>{{ $article->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control" value="{{ $article->author }}">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
