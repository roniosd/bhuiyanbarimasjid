<x-base-layout>
    <div class="overflow-hidden">

        <div class="flex items-center justify-center min-h-[80vh] px-6">
            <div class="bg-white rounded-3xl shadow-xl p-5 border border-gray-100 w-xl">

                <div class="text-center mb-8">

                    <img src="{{ $setting->logo ?? asset('public/storage/default/logo.png') }}"
                        class="h-16 mx-auto mb-4" alt="Larong">

                    <h2 class="text-3xl font-bold text-gray-800">
                        Admin Login
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Sign in to access your dashboard
                    </p>

                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>


                    <div class="flex justify-between items-center mb-6">

                        <a href="{{ route('forgot.send') }}" class="forgot-password">Forgot Password?</a>


                    </div>

                    <button type="submit"
                        class="w-full bg-[#216659] hover:bg-[#184E43] text-white font-semibold py-3 rounded-xl transition">

                        Login

                    </button>

                </form>

            </div>
        </div>
    </div>
</x-base-layout>
