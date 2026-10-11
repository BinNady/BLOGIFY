<x-guest-layout>
    <div class="max-w-md mx-auto mt-20 bg-white p-8 rounded-2xl shadow-lg text-center">
        
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            You must login first 
        </h2>

        <p class="mb-6 text-gray-600">
            You need to 
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">
                login
            </a> 
            to create a new post.
        </p>

        <a 
            href="{{ route('login') }}"
            class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl shadow-md hover:bg-blue-700 transition transform hover:-translate-y-0.5"
        >
             Go to Login
        </a>
    </div>
</x-guest-layout>
