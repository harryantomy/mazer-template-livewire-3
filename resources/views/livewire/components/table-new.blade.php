<div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    {{-- @if ($showRowNumbers)
                        <th>#</th>
                    @endif --}}
                    @foreach ($this->columns() as $column)
                        <th style="cursor: pointer;">
                            {{ $column->label }}
                        </th>
                    @endforeach
                    {{-- @if (count($actions) > 0)
                        <th>Actions</th>
                    @endif --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($this->data() as $row)
                    <tr>
                        {{-- @if ($showRowNumbers)
                            <td>{{ $data->firstItem() + $index }}</td>
                        @endif --}}
                        @foreach ($this->columns() as $column)
                            <td>
                                <x-dynamic-component :component="$column->component" :value="$row[$column->key]">
                                </x-dynamic-component>
                            </td>
                        @endforeach
                        {{-- @if (count($actions) > 0)
                            <td>
                                <div class="btn-group" role="group">
                                    @foreach ($actions as $action => $event)
                                        <button wire:click="callAction('{{ $action }}', {{ $item->id }})"
                                            class="btn btn-sm btn-outline-secondary">
                                            {{ ucfirst($action) }}
                                        </button>
                                    @endforeach
                                </div>
                            </td>
                        @endif --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="mt-4">

        {{ $data->links() }}
    </div> --}}
</div>
