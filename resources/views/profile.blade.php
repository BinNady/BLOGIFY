@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 gradient-title">
            My Profile
        </h2>

        <div class="space-y-4">
            <div>
                <span class="font-semibold text-gray-600">Name:</span>
                <span class="ml-2 text-gray-600">
                    {{ Auth::user()->name }}
                </span>

            </div>

            <div>
                <span class="font-semibold text-gray-600">Email:</span>
                <span class="ml-2 text-gray-600">
                    {{ Auth::user()->email }}
                </span>
            </div>

            <div>
                <span class="font-semibold text-gray-600">
                    Member Since:
                </span>
                <span class="ml-2 text-gray-600">
                    {{ Auth::user()->created_at->format('M d, Y') }}
                </span>
            </div>
        </div>

        <div class="mt-6 flex justify-center space-x-4">

            <!-- Delete Account -->
            <form 
            method="POST"
            action="{{ route('user.destroy', Auth::user()->id) }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')"
            >
                @csrf
                @method('DELETE')
                <button class="px-5 py-2 rounded-full font-semibold text-white bg-gradient-to-r from-red-500 to-pink-600 shadow-md hover:scale-105 transition">
                            Delete Account
                </button>
            </form>
        </div>
    </div>
@endsection
