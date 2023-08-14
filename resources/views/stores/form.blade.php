<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stores') }} 
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (Session::get('success') || Session::get('error'))
                    <x-banner style="success" message="{{ Session::get('success') ?? Session::get('danger') }}"/>
                @endif
                <div class="mb-6 mx-auto max-w-7xl py-6 px-2 sm:px-4 lg:px-6">
                    <div>

                    </div>
                    <div my-4>
                        @if (!empty($store))
                        <form method="POST" action="{{ route('stores.update', $store) }}">
                            @method('PUT')
                        @else
                        <form method="POST" action="{{ route('stores.store') }}">
                        @endif


                            @csrf
                            <h4 class="text-2xl font-bold mb-3">Details</h4>
                            <div class="grid grid-cols-2 pb-5 gap-8">
                                <div class="p-2">
                                    <div>
                                        <x-label for="title" value="{{ __('Title') }}" />
                                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$store->title ?? old('title')" required autofocus autocomplete="title" />
                                        <x-input-error for="title" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-label for="description" value="{{ __('Description') }}" />
                                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$store->description ?? old('description')" required autofocus />
                                        <x-input-error for="description" class="mt-2" />
                                    </div>
                                </div>
                                <div class="block">
                                    @if (!empty($store))
                                        <a href="{{ route('stores.create') }}" class="float-right btn-success my-5 mx-2">Create Store</a>
                                    @endif
                                    <a href="{{ route('stores.index') }}" class="float-right btn-info my-5 mx-2">Back to Stores</a>
                                </div>
                            </div>
                            <div class="mt-4 border-t border-gray-200 pt-4">
                                <x-button type="submit">
                                    {{ __(!empty($store) ? 'Update' : 'Save') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
