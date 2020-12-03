<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        Welcome to your Jetstream application!
                    </div>

                    @if(\Auth::user() && \Auth::user()->hasCredit())
                        <div class="mt-6 text-gray-500">
                            <form
                                method="POST"
                                action="{{ route('ad-lijn') }}"
                            >
                                @csrf

                                <!-- Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label
                                        for="name"
                                        value="{{ __('Name') }}"
                                    />
                                    <x-jet-input
                                        id="name"
                                        name="name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        value="{{ old('name') }}"
                                        wire:model.defer="state.name"
                                        autocomplete="name"
                                    />
                                    <x-jet-input-error
                                        for="name"
                                        class="mt-2"
                                    />
                                </div>

                                <!-- Mobile -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label
                                        for="mobile"
                                        value="{{ __('Mobile') }}"
                                    />
                                    <x-jet-input
                                        id="mobile"
                                        name="mobile"
                                        type="text"
                                        class="mt-1 block w-full"
                                        value="{{ old('mobile') }}"
                                        wire:model.defer="state.mobile"
                                    />
                                    <x-jet-input-error
                                        for="mobile"
                                        class="mt-2"
                                    />
                                </div>

                                <button
                                    type="submit"
                                    class="mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                                >

                                    {{ __('Save') }}
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
</x-app-layout>

