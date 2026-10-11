<x-guest-layout>
    <div class="w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl mx-auto mt-16 bg-white p-8 rounded-2xl shadow-md border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">
            Create your account
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm text-gray-700 mb-1">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm text-gray-700 mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm text-gray-700 mb-1">Password</label>
                <input id="password" name="password" type="password" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm text-gray-700 mb-1">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2.5 rounded-md hover:bg-blue-700 transition">
                Create account
            </button>

            <p class="text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a>
            </p>
        </form>
    </div>
</x-guest-layout>
