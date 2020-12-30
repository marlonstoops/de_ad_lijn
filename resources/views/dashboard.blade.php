<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome to the ADlijn!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <p>
                        Enter a name and phone number for the person to be Adlijned!
                    </p>

                    @if(\Auth::user() && \Auth::user()->hasCredit())
                    <div class="mt-6 text-gray-500">
                        Amount of calls you can make:
                        <b>{{ \Auth::user()->credit }}</b>
                    </div>
                    <div class="mt-6 text-gray-500">
                        <form
                            method="POST"
                            action="{{ route('ad-lijn') }}"
                        >
                            @csrf

                            <!-- Name -->
                            <div class="col-span-7 sm:col-span-4 mb-6">
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
                            <div class="col-span-6 sm:col-span-4 mb-6">
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

                            @if(\Auth::user()->hasRole('admin'))
                                <x-jet-label
                                    for="message_id"
                                    value="{{ __('Message') }}"
                                />
                                <select
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    name="message_id"
                                    id="message_id"
                                >
                                    @foreach(config('messages') as $id => $message)
                                        <option value="{{ $id }}">
                                            {{ strip_tags($message) }}
                                        </option>
                                    @endforeach
                                </select>

                            @endif

                            <button
                                type="submit"
                                class="mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                            >

                                {{ __('Call User!') }}
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="mt-6 text-red">
                        <p>
                            You ran out of calls, to reset it back to 5 get someone to Adlijn you.
                        </p>
                    </div>
                    @endif

                </div>
            </div>
        </div>
</x-app-layout>
