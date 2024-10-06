<?php

namespace App\Livewire\Components;

use Livewire\Component;

abstract class TableNew extends Component
{
    public abstract function query(): \Illuminate\Database\Eloquent\Builder;

    public abstract function columns(): array;

    public function data()
    {
        return $this
            ->query()
            ->get();
    }

    // public function render()
    // {
    //     return view('livewire.components.table-new');
    // }
}