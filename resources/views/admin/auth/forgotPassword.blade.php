<x-base-layout title="Login">
    <div class="overflow-hidden">

        <div class="flex items-center justify-center min-h-[80vh] px-6">
          

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('forgot.send') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button.primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button.primary-button>
                </div>
            </form>
        </div>
    </div>
</x-base-layout>
