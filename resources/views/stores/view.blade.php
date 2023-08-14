<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Store') }} 
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (Session::get('success') || Session::get('error'))
                    <x-banner style="success" message="{{ Session::get('success') ?? Session::get('danger') }}"/>
                @endif

                <div class="d-block mt-4">
                    <div class="grid grid-cols-2 pb-5 gap-8">
                        <div>
                            <div class="my-3">
                                <label class="font-bold">{{ __('Title') }}: </label>
                                <span>{{ $store->title }}</span>
                            </div>
                            <div class="my-3">
                            <label class="font-bold">{{ __('Description') }}</label>
                                <p>{{ $store->description }}</p>
                            </div>
                        </div>
                        <div class="block">
                            @if (!empty($store))
                                <a href="{{ route('stores.create') }}" class="float-right btn-success my-5 mx-2">Create Store</a>
                                <a href="{{ route('stores.edit', $store) }}" class="float-right btn-warning my-5 mx-2">Edit Store</a>
                            @endif
                            <a href="{{ route('stores.index') }}" class="float-right btn-info my-5 mx-2">Back to Stores</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
