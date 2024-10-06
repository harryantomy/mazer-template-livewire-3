<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">

    @vite(['resources/sass/app.scss', 'resources/sass/themes/dark/app-dark.scss', 'resources/sass/pages/auth.scss', 'resources/js/app.js'])
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    @vite('resources/js/initTheme.js')
    <div id="auth">
        {{ $slot }}
    </div>

    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}" data-navigate-once></script>
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
