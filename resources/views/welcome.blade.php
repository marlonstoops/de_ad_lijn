<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @auth
        <x-welomce-menu-item href="{{ route('dashboard') }}">
            {{ __('Dashboard') }}
        </x-welomce-menu-item>
        @else
        <x-welcome-menu-item href="{{ route('login') }}">
            {{ __('Login') }}
        </x-welcome-menu-item>

        <x-welcome-menu-item href="{{ route('register') }}">
            {{ __('Register') }}
        </x-welcome-menu-item>
        @endauth
    </x-jet-authentication-card>

</x-guest-layout>
