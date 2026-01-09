@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header bg-primary text-white rounded-top-4">
                <h5 class="mb-0">Create New Post</h5>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('posts.store') }}" novalidate>
                    @csrf

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter post title"
                               required
                               minlength="3">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @else
                            <div class="form-text">Minimum 3 characters</div>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Content</label>
                        <textarea name="content"
                                  rows="5"
                                  class="form-control @error('content') is-invalid @enderror"
                                  placeholder="Write your content here"
                                  required>{{ old('content') }}</textarea>

                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('posts.index') }}" class="btn btn-light">
                            Cancel
                        </a>
                        <button class="btn btn-success px-4">
                            Save Post
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
