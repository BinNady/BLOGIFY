@extends('layouts.app')
    
@section('content')

    <h2 class="font-semibold text-2xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent leading-tight mb-6">
        Welcome to Blogify, {{ Auth::user()->name }}!
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl p-8 shadow-md">
                
                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    🎉 We're happy to have you here!
                </h3>
                
                <p class="text-gray-600 leading-relaxed">
                    Start writing your posts and share your ideas with everyone on Blogify.
                </p>

                <div class="mt-8 flex justify-center gap-8">
                    <a href="{{ route('posts.create') }}" 
                        class="new-post px-6 py-2 rounded-xl font-semibold bg-gradient-to-r from-green-500 to-teal-500 text-white shadow-md hover:scale-105 transform transition">
                            Create New Post
                    </a>

                    <a href="/""
                    class="read-more">
                        Home
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection