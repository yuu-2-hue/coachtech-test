<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Category;

class Modal extends Component
{
    public $showModal = false;

    public $contact;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.modal', compact('categories'));
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
