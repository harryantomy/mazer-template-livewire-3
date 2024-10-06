<?php

namespace App\Livewire;

use App\Table\Column;
use App\Models\User;
use App\Livewire\Components\TableNew;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends TableNew
{
    public function query(): Builder
    {
        return User::query();
    }
    public function columns(): array
    {
        return [
            Column::make('name', 'Name'),
            Column::make('email', 'Email'),
            // Column::make('status', 'Status'),
            // Column::make('created_at', 'Created At'),
        ];
    }
}
