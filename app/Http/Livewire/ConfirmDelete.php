<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Store;

class ConfirmDelete extends Component
{

    public $selectedItem = false;
    public $store;

    public function render()
    {
        return view('livewire.confirm-delete');
    }

    public function confirmDelete()
    {
        $this->selectedItem = true;
    }

    public function cancelDelete()
    {
        $this->selectedItem = false;
    }
}
