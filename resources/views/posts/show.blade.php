@vite(['resources/css/app.css', 'resources/css/style.css'])
@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10">

        <!-- Post Card -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-10">
            <h1 class="post-title-inner text-4xl font-bold mb-2">
                {{ $post->title }}
            </h1>

            <!-- Author and Date -->
            <p class="post-meta text-sm text-gray-500 mb-4 flex items-center space-x-2">
                <span>Posted by:</span>
                <span class="author font-medium text-blue-600">
                    {{ $post->user->name }}
                </span>
                <span>•</span>
                <span class="date">
                    {{ $post->created_at->format('M d, Y') }}
                </span>
            </p>

            <!-- Content of post -->
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 shadow-sm">
                <p class="whitespace-pre-line text-lg text-gray-800 leading-relaxed font-medium">
                    {{ $post->body }}
                </p>
            </div>

            <!-- Delete Post -->
            @if (Auth::id() === $post->user_id)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end mt-6">
                        <button class="px-5 py-2 rounded-full font-semibold text-white bg-gradient-to-r from-red-500 to-pink-600 shadow-md hover:scale-105 transition">
                            Delete Post
                        </button>
                    </div>
                </form>
            @endif
        </div>

        <!-- Comments Section -->
        <div class="bg-gray-50 shadow-inner rounded-lg p-6 mt-10 max-w-3xl mx-auto">

            <h3 class="text-2xl font-bold mb-6 bg-gradient-to-r from-blue-500 to-indigo-600 bg-clip-text text-transparent">
                Comments
            </h3>

            <!-- List of Comments -->
            @foreach ($post->comments as $comment)
                <div class="mb-4 bg-white p-5 rounded-2xl shadow-md border border-gray-100 flex justify-between items-start transition-transform hover:scale-[1.01] hover:shadow-lg">
                    <div>
                        <p class="font-semibold text-blue-600 mb-1">
                            {{ $comment->user->name }}:
                        </p>
                        <p class="text-gray-800 leading-relaxed">
                            {{ $comment->body }}
                        </p>
                    </div>

                    <!-- Delete button only for comment owner -->
                    @if (Auth::id() === $comment->user_id)
                        <form
                            action="{{ route('comments.destroy', $comment->id) }}"
                            method="POST" 
                            onsubmit="return confirm('Are you sure you want to delete this comment?');"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-pink-600 hover:scale-105 transition">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach

            <!-- Add a new comment if loged in -->
            @auth
                <div class="mt-6">
                    <h3 class="text-xl font-bold mb-4 text-blue-500">
                        Leave a Comment
                    </h3>
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <textarea name="body" rows="4"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Write your comment..."></textarea>
                        <button type="submit" class="new-post">
                            Add Comment
                        </button>
                    </form>
                </div>
            @else
                <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 px-4 py-3 rounded-md mt-6 text-center font-medium"
                    role="alert">
                    You must be
                    <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">login</a>
                    to leave a comment.                                 
                </div>
            @endauth
        </div>
    </div>
@endsection