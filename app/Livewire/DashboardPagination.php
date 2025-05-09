<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class DashboardPagination extends Component
{
    // variables
    public int $page;
    public object $cryptoData;

    // initial setup
    public function mount(int $page, object $cryptoData): void
    {
        $this->page = $page;
        $this->cryptoData = $cryptoData;
    }

    // prev page func
    public function prevPage()
    {
        if ($this->page == 1) return $this->page = 1;

        // get prev page
        $this->page--;
        $this->dispatch('page-changed', $this->page)->to(Dashboard::class);
    }

    // next page func
    public function nextPage()
    {
        if ($this->page > 1 && empty($this->cryptoData)) return $this->page = 1;

        // get next page
        $this->page++;
        $this->dispatch('page-changed', $this->page)->to(Dashboard::class);
    }

    // render view
    public function render(): View
    {
        return view('livewire.dashboard-pagination');
    }
}
