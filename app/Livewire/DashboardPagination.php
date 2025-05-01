<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardPagination extends Component
{
    public $page;
    public $cryptoData;

    public function mount($page, $cryptoData)
    {
        $this->page = $page;
        $this->cryptoData = $cryptoData;
    }

    public function prevPage(){
        if($this->page == 1) return $this->page = 1;

        // get prev page
        $this->page--;
        $this->dispatch('page-changed', $this->page)->to(Dashboard::class);
    }

    public function nextPage(){
        if($this->page > 1 && empty($this->cryptoData)) return $this->page = 1;

        // get next page
        $this->page++;
        $this->dispatch('page-changed', $this->page)->to(Dashboard::class);
    }

    public function render()
    {
        return view('livewire.dashboard-pagination');
    }
}
