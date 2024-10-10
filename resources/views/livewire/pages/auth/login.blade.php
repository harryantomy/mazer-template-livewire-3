<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        try {
            $this->validate();

            $this->form->authenticate();

            Session::regenerate();
            $user = auth()->user();
            $this->dispatch('showToast', type: 'success', message: 'Welcome back,' . $user->name);
            $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
            // $this->dispatch('showToast', type: 'success', message: 'Welcome back,' . $user->name);
        } catch (ValidationException $e) {
            $errors = $e->errors();
            $errorMessage = $errors['form.email'][0] ?? trans('auth.failed');

            $this->dispatch('showToast', type: 'error', message: $errorMessage);

            // Re-throw exception agar Livewire dapat menangani validasi error
            throw $e;
        }
    }
}; ?>

<div>
    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block w-full mt-1" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block w-full mt-1" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="" style="margin-bottom: 70px">
                    <a href="{{ route('login') }}" wire:navigate><img
                            src="{{ asset('assets/static/images/logo/logo-tutwuri.png') }}" height="80"
                            alt="Logo"></a>
                </div>
                <h2 class="">Selamat Datang</h2>
                <p class="mb-5 ">Silakan Login Menggunakan Akun Saat Pendaftaran</p>
                <form wire:submit="login">
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input wire:model="form.username" id="username" class="form-control form-control-lg"
                            placeholder="Username" type="text" name="username" autofocus autocomplete="username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    {{-- <div class="mb-4 form-group position-relative has-icon-left">
                        <input type="text" class="form-control form-control-lg" placeholder="Username"
                            name="username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div> --}}
                    <div class="mb-4 form-group position-relative has-icon-left">
                        <input wire:model="form.password" id="password" type="password"
                            class="form-control form-control-lg" placeholder="Password" name="password"
                            autocomplete="current-password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input wire:model="form.remember" id="remember" class="form-check-input me-2" type="checkbox"
                            value="" id="flexCheckDefault" name="remember">
                        <label class="text-gray-600 form-check-label" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div>
                    <button type="submit" class="mt-5 text-white shadow-lg btn btn-primary btn-block btn-md">Log in
                        <div wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                    </button>
                </form>
                <div class="mt-5 text-lg text-center fs-6">
                    <p class="text-gray-600">Don't have an account? <a href="" class="font-bold">Sign
                            up</a>.</p>
                    <p><a class="font-bold" href="#">Forgot password?</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="" class="bg-primary">
                <img src="{{ asset('assets/static/images/bg/bg-sma7jambi.jpg') }}"class="opacity-75"
                    style="object-fit: cover" width="100%" height="900" alt="bg-jatra">
            </div>
        </div>
    </div>
</div>
