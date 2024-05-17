<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.main')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

<div class="bg-white dark:bg-gray-900">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex justify-center h-screen">

        {{-- <img class="hidden object-cover lg:block lg:w-1/2 max-h-screen"
            src="https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" />
        --}}
        <div class="hidden object-cover lg:block lg:w-1/2 max-h-screen bg-cover bg-center bg-no-repeat"
            style="background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
            <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                <div>
                    <h2 class="text-2xl font-bold text-white sm:text-3xl">{{env('app_name')}}</h2>

                    <p class="max-w-xl mt-3 text-gray-300">

                        Providing comprehensive IT support solutions to ensure your technology runs smoothly,
                        <span>{{env('app_name')}}</span> is dedicated to
                        enhancing your business operations with expert service and cutting-edge technology.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
            <div class="flex-1">
                <div class="text-center">
                    <div class="flex justify-center mx-auto">
                        <a href="{{route('home')}}">
                            <x-application-logo class="w-auto h-64" />
                        </a>
                    </div>

                    <p class="mt-3 text-gray-500 dark:text-gray-300">Sign in to access your account</p>
                </div>

                <div class="mt-8">

                    <form wire:submit="login">

                        <!-- Email Address -->
                        <div>
                            <x-custom-input-label for="email" :value="__('Email')"
                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200" />
                            <x-text-input wire:model="form.email" id="email"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                type="text" name="email" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-6">
                            <div class="flex justify-between mb-2">
                                <x-custom-input-label for="password" :value="__('Password')"
                                    class="text-sm text-gray-600 dark:text-gray-200" />

                                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                                @if (Route::has('password.request'))
                                <a class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline"
                                    href="{{ route('password.request') }}" wire:navigate>
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </div>
                            <x-text-input wire:model="form.password" id="password"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                type="password" name="password" required autofocus autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember" class="inline-flex items-center">
                                <input wire:model="form.remember" id="remember" type="checkbox"
                                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me')
                                    }}</span>
                            </label>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                {{ __('Login') }}
                            </button>
                        </div>

                    </form>

                    <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a
                            href="{{ route('register') }}" wire:navigate
                            class="text-blue-500 focus:outline-none focus:underline hover:underline">Register</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
