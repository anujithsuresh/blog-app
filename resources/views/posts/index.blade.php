@extends('layouts.app')

@section('content')

<!-- Dashboard Header -->
<div class="dashboard-header p-4 rounded-4 mb-5 d-flex
            justify-content-between align-items-center shadow-sm">
    <h3 class="fw-bold text-primary mb-0">
        📝 Blog Dashboard
    </h3>

    <a href="{{ route('posts.create') }}" class="btn btn-success px-4">
        + New Post
    </a>
</div>

<!-- Posts Grid -->
<div class="row">
@forelse($posts as $post)
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card post-card h-100 border-0 rounded-4">
            <div class="card-body d-flex flex-column">

                <h5 class="fw-semibold text-dark mb-2">
                    {{ $post->title }}
                </h5>

                <p class="text-secondary flex-grow-1">
                    {{ Str::limit($post->content, 120) }}
                </p>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="badge author-badge px-3 py-2">
                        👤 {{ $post->user->name }}
                    </span>

                    @if(auth()->id() === $post->user_id)
                        <div class="d-flex gap-2">
                            <a href="{{ route('posts.edit',$post) }}"
                               class="btn btn-sm btn-outline-primary">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('posts.destroy',$post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this post?')">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info text-center rounded-4 shadow-sm">
            No posts found. Create your first post 🚀
        </div>
    </div>
@endforelse
</div>

<!-- Page Styling -->
<style>
    .dashboard-header {
        background: linear-gradient(135deg, #e3f2fd, #ffffff);
    }

    .post-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .post-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 35px rgba(0, 0, 0, 0.1);
    }

    .author-badge {
        background-color: #e7f1ff;
        color: #0d6efd;
        font-weight: 500;
    }
</style>

@endsection
