<div>
    <div class="d-grid justify-content-center mb-3 d-md-flex justify-content-md-between">
        <div class="d-flex mb-1 ">
            <p class="my-auto px-1">Show</p>
            <select wire:model.live="perPage" class="form-select form-select-sm">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <p class="my-auto px-1">Entries</p>
        </div>
        <div>
            <input wire:model.live="searchTerm" type="text" class="form-control" placeholder="Search...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    @if ($showRowNumbers)
                        <th>#</th>
                    @endif
                    @foreach ($columns as $key => $column)
                        <th wire:click="sortBy('{{ $key }}')" style="cursor: pointer;">
                            {{ $column }}
                            @if ($sortColumn === $key)
                                <span class="ms-1">
                                    @if ($sortDirection === 'asc')
                                        <i class="bi bi-arrow-up"></i>
                                    @else
                                        <i class="bi bi-arrow-down"></i>
                                    @endif
                                </span>
                            @endif
                        </th>
                    @endforeach
                    @if (count($actions) > 0)
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        @if ($showRowNumbers)
                            <td>{{ $data->firstItem() + $index }}</td>
                        @endif
                        @foreach ($columns as $key => $column)
                            <td>
                                @if (isset($customColumns[$key]))
                                    @php
                                        $value = $customColumns[$key]['value'] ?? '';
                                        $class = $customColumns[$key]['class'] ?? '';
                                        $style = $customColumns[$key]['style'] ?? '';
                                        $itemValue = $item->$key; // Ambil nilai dari item

                                        $itemClass = ''; // Variabel untuk menyimpan kelas yang sesuai

                                        // Cek nilai dan sesuaikan kelas
                                        if ($value) {
                                            foreach ($value as $index => $val) {
                                                if ($itemValue == $val) {
                                                    $itemClass = $class[$index];
                                                    break;
                                                }
                                            }
                                        }
                                        if ($class && !$itemClass) {
                                            foreach ($class as $index => $val) {
                                                $itemClass = $val;
                                            }
                                        }
                                    @endphp

                                    @if ($itemClass)
                                        <span class="{{ $itemClass }}" style="{{ $style }}">
                                            {{ $itemValue }}
                                        </span>
                                    @else
                                        {{ $itemValue }}
                                        <!-- Jika tidak ada kelas yang sesuai, tampilkan nilai biasa -->
                                    @endif
                                @else
                                    {{ $item->$key }}
                                    <!-- Jika kolom tidak ada dalam customColumns, tampilkan nilai biasa -->
                                @endif
                            </td>
                        @endforeach
                        @if (count($actions) > 0)
                            <td>
                                <div class="btn-group" role="group">
                                    @foreach ($actions as $action => $actionData)
                                        @php
                                            $event = is_array($actionData) ? $actionData['event'] ?? '' : $actionData;
                                            $class = is_array($actionData)
                                                ? $actionData['class'] ?? 'btn-outline-secondary'
                                                : 'btn-outline-secondary';
                                            $icon = is_array($actionData) ? $actionData['icon'] ?? '' : '';
                                            $text = is_array($actionData)
                                                ? $actionData['text'] ?? ucfirst($action)
                                                : ucfirst($action);
                                            $condition =
                                                is_array($actionData) && isset($actionData['condition'])
                                                    ? $actionData['condition']($item)
                                                    : true;
                                        @endphp
                                        @if ($condition)
                                            <button wire:click="callAction('{{ $action }}', {{ $item->id }})"
                                                class="btn btn-sm {{ $class }}">
                                                @if ($icon)
                                                    <i class="{{ $icon }}"></i>
                                                @endif
                                                {{ $text }}
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">

        {{ $data->links() }}
    </div>

</div>
