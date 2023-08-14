<div class="inline">
    <button wire:click.prevent="confirmDelete()" class="text-red-700">Delete</button>

    <x-dialog-modal wire:model="selectedItem">
        <x-slot name="title">
            <div class="text-left">
                Delete
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="text-left">
                Are you sure you want to delete {{ $store->title ?? '' }}?
            </div>
        </x-slot>
        <x-slot name="footer">
            <a wire:click.prevent="cancelDelete()" class="btn btn-primary btn-sm mr-4">No</a>
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </x-slot>  
    </x-dialog-modal>
</div>
