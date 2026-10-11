<x-guest-layout>
    <div class="max-w-sm mx-auto mt-20 bg-white p-6 rounded-lg shadow border border-gray-200">
        <h2 class="text-xl font-bold text-center text-blue-700 mb-6">
            Login
        </h2>

        @if ($errors->any())
            <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700 border border-red-300">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700 mb-1">
                    Email
                </label>
                <input 
                 type="email" 
                 name="email" 
                 id="email"
                 class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                       required autofocus
                >
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700 mb-1">
                    Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                    required
                >
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Log in
            </button>
        </form>
        
        <p class="mt-4 text-center text-sm text-gray-600">
            Don't have an account?
            <a 
             href="{{ route('register') }}" 
             class="text-blue-600 hover:underline">
                Create account
            </a>
        </p>
    </div>
</x-guest-layout>