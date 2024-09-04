<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchField extends Component
{
    public $search = "";

    public function updatedSearch()
    {
        $this->emit("issuesSearchUpdated", $this->search);
    }

    public function render()
    {
        return view("livewire.search-field");
    }
}