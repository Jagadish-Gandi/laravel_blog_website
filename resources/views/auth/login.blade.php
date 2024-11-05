<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h4 class="text-center">Only admin</h4>
        
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a> --}}
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>  

        <!-- Button to Open Modal for Test Credentials -->
        @if (app()->environment('local'))
            <div class="mt-4">
                <button onclick="openModal()" class="text-blue-600 underline" style="color: green">Click here for Admin credentials</button>
            </div>
        @endif

        <div id="credentialModal" class="fixed inset-0 hidden items-center justify-center bg-gray-800 bg-opacity-75 z-50">
            <div class="bg-white p-6 rounded shadow-lg w-80">
                <h2 class="text-lg font-semibold mb-2">Admin Test Credentials</h2>
                <p>Email: <strong>admin@gmail.com</strong></p>
                <p>Password: <strong>12345678</strong></p>
                <button onclick="closeModal()" class="mt-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded" style="background-color: red">Close</button>
            </div>
        </div>
    </form>

    <script>
        function openModal() {
            document.getElementById("credentialModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("credentialModal").style.display = "none";
        }

        // Optional: close modal on outside click
        window.onclick = function(event) {
            const modal = document.getElementById("credentialModal");
            if (event.target == modal) {
                closeModal();
            }
        };
    </script>
</x-guest-layout>
