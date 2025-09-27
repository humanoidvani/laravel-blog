@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Blog Articles</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Create New Article</a>
    </div>

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('articles.show', $article) }}" class="text-decoration-none">
                                {{ $article->title }}
                            </a>
                        </h5>
                        <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        By {{ $article->author ?? 'Unknown' }} | {{ $article->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $articles->links('pagination::bootstrap-5') }}
@endsection
