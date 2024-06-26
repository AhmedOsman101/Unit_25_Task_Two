<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.main')] class extends Component
{

    public string $firstName = '';
    public string $lastName = '';
    public string $name = '';
    public string $email = '';
    public string $address = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void {

        $this->name = trim($this->firstName) . ' ' . trim($this->lastName);

        $validated = $this->validate([
            'firstName' => ['required', 'string', 'max:127'],
            'lastName' => ['required', 'string', 'max:127'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        unset($validated['first_name']);
        unset($validated['last_name']);
        event(new Registered($user = User::create($validated)));

        
        
        Auth::login($user, true);
        
        // logout the admin and make it access the website as a user
        Auth::guard('admin')->logout();

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; 
?>

<section class="bg-white dark:bg-gray-900">
    <div class="flex justify-center h-screen">
        <img class="hidden object-cover bg-cover lg:block lg:w-2/5 max-h-screen"
            src="{{ asset('images/register.png') }}" alt="register image">
        </img>

        <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
            <div class="w-full">
                <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                    Get your free account now.
                </h1>

                <p class="mt-4 text-gray-500 dark:text-gray-400">
                    Let’s get you all set up so you can verify your personal account and begin setting up your profile.
                </p>

                <form wire:submit="register" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" novalidate>
                    <div>
                        <x-custom-input-label for="firstName" :value="__('FirstName')"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-200" />
                        <x-text-input wire:model="firstName" id="firstName" placeholder="John"
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                            type="text" name="firstName" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                    </div>

                    <div>
                        <x-custom-input-label for="lastName" :value="__('LastName')"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-200" />
                        <x-text-input wire:model="lastName" id="lastName" placeholder="Snow"
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                            type="text" name="lastName" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                    </div>

                    <div>
                        <x-custom-input-label for="address" :value="__('Address')"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-200" />
                        <x-text-input wire:model="address" id="address" placeholder="123 fake st."
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                            type="text" name="address" required autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div>
                        <x-custom-input-label for="email" :value="__('Email')"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-200" />
                        <x-text-input wire:model="email" id="email" placeholder="johnsnow@example.com"
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                            type="email" name="email" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-custom-input-label for="password" :value="__('Password')"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-200" />
                        <x-text-input wire:model="password" id="password" placeholder="Enter your password"
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                            type="password" name="password" required autofocus autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-custom-input-label for="password_confirmation" :value="__('Confirm password')"
                            class="block mb-2 text-sm text-gray-600 dark:text-gray-200" />
                        <x-text-input wire:model="password_confirmation" id="password_confirmation"
                            placeholder="Enter your password"
                            class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                            type="password" name="password_confirmation" required autofocus
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex justify-between items-end">

                        <p
                            class="w-full text-sm text-gray-600 dark:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Already registered?') }} <a href="{{ route('login') }}"
                                class="underline hover:text-gray-900 dark:hover:text-gray-300 transition-colors duration-500">{{
                                __(' Login') }}</a>
                        </p>

                    </div>
                    <button type="submit"
                        class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        <span>{{ __('Register') }}</span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
