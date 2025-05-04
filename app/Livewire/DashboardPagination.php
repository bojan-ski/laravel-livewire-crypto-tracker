<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class DashboardPagination extends Component
{
    public int $page;
    public object $cryptoData;

    public function mount(int $page, object $cryptoData): void
    {
        $this->page = $page;
        $this->cryptoData = $cryptoData;
    }

    public function prevPage()
    {
        if ($this->page == 1) return $this->page = 1;

        // get prev page
        $this->page--;
        $this->dispatch('page-changed', $this->page)->to(Dashboard::class);
    }

    public function nextPage()
    {
        if ($this->page > 1 && empty($this->cryptoData)) return $this->page = 1;

        // get next page
        $this->page++;
        $this->dispatch('page-changed', $this->page)->to(Dashboard::class);
    }

    public function render(): View
    {
        return view('livewire.dashboard-pagination');
    }
}
