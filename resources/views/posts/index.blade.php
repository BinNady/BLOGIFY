
@vite(['resources/css/app.css', 'resources/css/style.css'])

@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2 class="text-3xl font-semibold tracking-wide bg-gradient-to-r from-blue-600 to-purple-600 text-transparent bg-clip-text opacity-90">
            All Posts
        </h2>
        <a
         href="{{ route('posts.create') }}" class="new-post">
            New Post
        </a>
    </div>
    <br>

    @foreach ($posts as $post)
        <div class="post mb-8 p-6 bg-white rounded-lg shadow-sm">
            <!-- Title -->
            <h3 class="post-title text-xl font-semibold text-gray-800 mb-2 hover:text-blue-600 transition-colors">
                {{ $post->title }}
            </h3>

            <!-- Author and Date -->
            <p class="post-meta text-sm text-gray-500 mb-4 flex items-center space-x-2">
                <span>Posted by:</span>
                <span class="author font-medium text-blue-600">{{ $post->user->name }}</span>
                <span>•</span>
                <span class="date">{{ $post->created_at->format('M d, Y') }}</span>
            </p>

            <!-- Post Body -->
            <p class="text-blue-900 mb-4">
                {{ Str::limit($post->body, 150) }}
            </p>
            <br>

            <!-- Read More Button -->
            <a href="{{ route('posts.show', $post->id) }}" 
            class="read-more">
            Read More
            </a>
        </div>
    @endforeach
@endsection
