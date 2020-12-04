<?php

namespace App\Http\Livewire\Navbar;

use App\Models\User;
use Livewire\Component;

class SearchBar extends Component
{
    public $search;
    public $searchResults;

    public function mount()
    {
        $this->search = '';
        $this->searchResults = [];
    }

    public function updatedSearch()
    {
        $this->searchResults = User::where('name', 'LIKE', '%' . $this->search . '%')
                                            ->get();
    }

    public function render()
    {
        return view('livewire.navbar.search-bar');
    }
}
