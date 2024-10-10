<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
    {{-- @vite(['resources/sass/app.scss', 'resources/sass/themes/dark/app-dark.scss', 'resources/js/app.js']) --}}
    @vite(['resources/sass/app.scss', 'resources/sass/themes/dark/app-dark.scss', 'resources/js/app.js'])
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    @vite('resources/js/initTheme.js')
    <div id="app">
        <div id="sidebar">
            @include('layouts.partials.sidebar')
        </div>
        <div id="main" class="layout-navbar navbar-fixed">
            <header>
                <livewire:layout.navigation />
            </header>
            <div id="main-content">
                {{ $slot }}
            </div>
            @include('layouts.partials.footer')
        </div>
    </div>
    <script src="{{ asset('assets/static/js/components/dark.js') }}" data-navigate-once></script>
    {{-- <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> --}}
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/compiled/css/app.css') }}" data-navigate-once></script>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}" data-navigate-once>
    </script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/extensions/flatpickr/flatpickr.min.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/static/js/pages/date-picker.js') }}" data-navigate-once></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}" data-navigate-once></script>
    {{-- @vite(['resources/js/app.js']) --}}

    <script data-navigate-once>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        document.addEventListener('livewire:init', () => {
            Livewire.on('showToast', (event) => {
                Toast.fire({
                    icon: event.type,
                    title: event.message
                });
            });
        });
    </script>
</body>

</html>
