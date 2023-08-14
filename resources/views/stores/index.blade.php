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

                <div class="block mt-4">
                    <div class="block">
                        <a href="{{ route('stores.create') }}" class="float-right btn-success my-5 mx-2">Create Store</a>
                    </div>
                    @if(!empty($stores))
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border py-2 w-20">ID</th>
                                    <th class="border py-2">Title</th>
                                    <th class="border py-2">Description</th>
                                    <th class="border py-2">Created</th>
                                    <th class="border py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td class="border text-center py-2">{{ $store->id }}</td>
                                        <td class="border text-center py-2">{{ $store->title }}</td>
                                        <td class="border text-center py-2">{{ $store->description }}</td>

                                        <td class="border text-center py-2">{{ $store->created_at }}</td>
                                        <td class="border text-center py-2">
                                            <a class="text-blue-900" href="{{ route('stores.show', $store) }}">View</a>&nbsp;|&nbsp;
                                            <a class="text-blue-900" href="{{ route('stores.edit', $store) }}">Edit</a>&nbsp;|&nbsp;

                                            <form action="{{ route('stores.destroy',$store) }}" method="Post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                
                                                    <livewire:confirm-delete :store="$store" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {!! $stores->links() !!}
                        </div>
                    @else
                        <p class="text-center">No Stores found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
