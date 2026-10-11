
@vite(['resources/css/app.css', 'resources/css/style.css'])
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-12">
        <div class="bg-white shadow-lg rounded-2xl p-8 border border-gray-100">
            
        <h1 class="text-3xl font-semibold tracking-wide text-center 
                bg-gradient-to-r from-blue-600 to-purple-600 
                text-transparent bg-clip-text opacity-90">
            Create New Post
        </h1>

            <form 
                action="{{ route('posts.store') }}" 
                method="POST" 
                class="space-y-6"
            >
                @csrf

                <div>
                    <label for="title"class="block text-blue-600 font-medium mb-2">Title</label>
                    <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('title') border-red-500 @enderror"
                     placeholder="Enter your post title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="body" class="block text-blue-600 font-medium mb-2">Body</label>
                    <textarea name="body" id="body" rows="8"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('body') border-red-500 @enderror"
                        placeholder="Write your post here...">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-4 text-center">
                    
                    <!-- Add Post Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="w-full text-white font-semibold py-3 px-6 rounded-full 
                                bg-gradient-to-r from-purple-600 to-pink-500 
                                shadow-lg transition-all transform hover:scale-105 hover:opacity-90 hover:shadow-xl">
                            Add Post
                        </button>
                    </div>

                    <!-- Back to Home Button -->
                    <a href="/"
                    class="inline-block w-full bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg hover:bg-gray-300 transition">
                        Back to Home
                    </a>
                </div>
            </form>
        </div>
    </div>

@endsection
