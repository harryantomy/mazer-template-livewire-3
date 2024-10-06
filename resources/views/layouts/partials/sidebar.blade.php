<x-mazer-sidebar :href="route('dashboard')" logo="{{ asset('assets/static/images/logo/logo-tutwuri.png') }}">
    <x-mazer-sidebar-item icon="bi bi-grid-fill" :link="route('dashboard')" name="Dashboard" :active="request()->routeIs('dashboard') ? 'active' : ''" />
    {{-- <x-mazer-sidebar-item icon="bi bi-stack" :link="route('admin.dashboard')" name="Components">
        <x-mazer-sidebar-subitem :link="route('component.accordion')" name="Accordion" :active="true" />
    </x-mazer-sidebar-item> --}}
    <li class="sidebar-title">Data Master</li>
    <x-mazer-sidebar-item icon="bi bi-tags-fill" :link="route('counter')" name="Guru" :active="request()->routeIs('counter') ? 'active' : ''" />
    {{-- <x-mazer-sidebar-item icon="bi bi-car-front-fill" :link="route('transportasi.index')" name="Transportasi" :active="request()->routeIs('transportasi.index') ? 'active' : ''" />
    <x-mazer-sidebar-item icon="bi bi-signpost-2" :link="route('rute.index')" name="Rute" :active="request()->routeIs('rute.index') ? 'active' : ''" />
    <x-mazer-sidebar-item icon="bi bi-bank2" :link="route('bank.index')" name="Bank" :active="request()->routeIs('bank.index') ? 'active' : ''" />
    <x-mazer-sidebar-item icon="bi bi-people-fill" :link="route('user.index')" name="User" :active="request()->routeIs('user.index') ? 'active' : ''" />
    <li class="sidebar-title">Tiket</li>
    <x-mazer-sidebar-item icon="bi bi-calendar3" :link="route('jadwal-tiket.index')" name="Jadwal" :active="request()->routeIs('jadwal-tiket.index') ? 'active' : ''" />
    <x-mazer-sidebar-item icon="bi bi-cart-check-fill" :link="route('daftar-transaksi-pemesanan.index')" name="Pemesanan" :active="request()->routeIs('daftar-transaksi-pemesanan.index') ? 'active' : ''" />
    <x-mazer-sidebar-item icon="bi bi-calendar2-check-fill" :link="route('daftar-pembayaran.index')" name="Pembayaran" :active="request()->routeIs('daftar-pembayaran.index') ? 'active' : ''" />
    <li class="sidebar-title">Laporan</li>
    <x-mazer-sidebar-item icon="bi bi-file-earmark-bar-graph-fill" :link="route('laporan.index')" name="Laporan"
        :active="request()->routeIs('laporan.index') ? 'active' : ''" /> --}}

</x-mazer-sidebar>
