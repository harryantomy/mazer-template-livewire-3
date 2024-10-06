@props(['icon', 'link', 'name', 'active' => false])

<li class="sidebar-item {{ $active ?? 'active' }} {{ $slot->isEmpty() ? '' : 'has-sub' }}">
    <a href="{{ $slot->isEmpty() ? $link : '#' }}" class='sidebar-link' wire:navigate>
        <i class="{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
    @if (!$slot->isEmpty())
        <ul class="submenu {{ $active ?? 'active' }}">
            {{ $slot ?? '' }}
        </ul>
    @endif
</li>
