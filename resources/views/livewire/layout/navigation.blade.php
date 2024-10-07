<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="navbar navbar-expand navbar-light navbar-top">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
                {{-- <li class="nav-item dropdown me-1">
                    <a class="text-gray-600 nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class='bi bi-envelope bi-sub fs-4'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Mail</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                    </ul>
                </li> --}}
                <li class="nav-item dropdown me-3">
                    <a class="text-gray-600 nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false">
                        <i class='bi bi-bell bi-sub fs-4'></i>
                        <span class="badge badge-notification bg-danger"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-center dropdown-menu-sm-end notification-dropdown"
                        aria-labelledby="dropdownMenuButton">
                        <li class="dropdown-header">
                            <h6>Notifications</h6>
                        </li>
                        {{-- <li class="dropdown-item notification-item">
                            <a class="d-flex align-items-center" href="#">
                                <div class="notification-icon bg-primary">
                                    <i class="bi bi-cart-check"></i>
                                </div>
                                <div class="notification-text ms-4">
                                    <p class="font-bold notification-title">Successfully check out</p>
                                    <p class="text-sm font-thin notification-subtitle">Order ID #256</p>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-item notification-item">
                            <a class="d-flex align-items-center" href="#">
                                <div class="notification-icon bg-success">
                                    <i class="bi bi-file-earmark-check"></i>
                                </div>
                                <div class="notification-text ms-4">
                                    <p class="font-bold notification-title">Homework submitted</p>
                                    <p class="text-sm font-thin notification-subtitle">Algebra math homework</p>
                                </div>
                            </a>
                        </li> --}}
                        <li>
                            <p class="py-2 mb-0 text-center"><a href="#">See all notification</a></p>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">
                                {{ auth()->user()->name }}
                                {{-- Harry Antomy --}}
                            </h6>
                            <p class="mb-0 text-sm text-gray-600">
                                {{ Str::ucfirst(Auth::user()->roles->first()->name) }}
                                {{-- Super Admin --}}
                            </p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('assets/compiled/jpg/2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                    style="min-width: 11rem;">
                    <li>
                        <h6 class="dropdown-header">Hello,
                            {{ Auth::user()->name }}
                        </h6>
                    </li>
                    <li>
                        <a class="dropdown-item" href="">
                            <i class="icon-mid bi bi-person me-2"></i>
                            My Profile
                        </a>
                    </li>
                    {{-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                            Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                            Wallet</a></li> --}}
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a wire:click="logout" class="dropdown-item" style="cursor: pointer;"><i
                                class="icon-mid bi bi-box-arrow-left me-2"></i>
                            Logout</a>
                        {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a> --}}
                        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form> --}}

                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
