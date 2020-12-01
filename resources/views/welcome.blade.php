<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @auth
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        @else
            <x-jet-responsive-nav-link href="{{ route('login') }}">
                {{ __('Login') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('register') }}">
                {{ __('Register') }}
            </x-jet-responsive-nav-link>
        @endauth
    </x-jet-authentication-card>

</x-guest-layout>

