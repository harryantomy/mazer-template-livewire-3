<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class Table extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $model;
    public $columns;
    public $searchColumns = [];
    public $sortColumn = '';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $perPage = 10;
    public $actions = [];
    public $conditions = [];
    public $showRowNumbers = true;
    public $customColumns = [];
    public $withRelations = [];

    public function mount($model, $columns, $searchColumns = [], $sortColumn = '', $actions = [], $conditions = [], $showRowNumbers = true, $customColumns = [],  $withRelations = [])
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->searchColumns = $searchColumns;
        $this->sortColumn = $sortColumn ?: array_key_first($columns);
        $this->actions = $actions;
        $this->conditions = $conditions;
        $this->showRowNumbers = $showRowNumbers;
        $this->customColumns = $customColumns;
        $this->withRelations = $withRelations;
    }

    public function sortBy($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortColumn = $column;
    }

    public function render()
    {
        $query = $this->model::query();

        // Eager load relasi jika ada
        if (!empty($this->withRelations)) {
            $query->with($this->withRelations); // Load relasi berdasarkan input
        }

        // Apply custom conditions
        foreach ($this->conditions as $condition) {
            $query->where(function (Builder $query) use ($condition) {
                $condition($query);
            });
        }

        if ($this->searchTerm && !empty($this->searchColumns)) {
            $query->where(function ($q) {
                foreach ($this->searchColumns as $column) {
                    $q->orWhere($column, 'like', '%' . $this->searchTerm . '%');
                }
            });
        }

        $data = $query->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.components.table',  [
            'data' => $data,
        ]);
    }
    public function callAction($action, $id)
    {
        if (isset($this->actions[$action])) {
            $this->dispatch($this->actions[$action], $id);
        }
    }
    // public function getCustomColumn($column)
    // {
    //     // kelola custom column class, style dan lainnya
    //     return $this->customColumns[$column] ?? [];
    // }
    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
}
