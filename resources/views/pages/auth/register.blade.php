<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{state, rules};

middleware(['guest']);
state(['name' => '', 'email' => '', 'city' =>'', 'state' =>'', 'country' => '', 'phone' =>'', 'address' =>'', 'password' => '', 'passwordConfirmation' => '']);
rules(
    [
    'name' => 'required', 
    'email' => 'required|email|unique:users', 
    'city' => 'required|max:50', 
    'state' => 'required|max:50',
    'country' => 'required|max:50',
    'phone' => 'required|max:50',
    'address' => 'required|max:200',
    'password' => 'required|min:8|same:passwordConfirmation'
]);
name('register');

$register = function(){
    $this->validate();

    $user = User::create([
        'email' => $this->email,
        'name' => $this->name,
        'city' => $this->city,
        'state' => $this->state,
        'country' => $this->country,
        'phone' => $this->phone,
        'address' => $this->address,
        'password' => Hash::make($this->password),
    ]);

    event(new Registered($user));

    Auth::login($user, true);

    return redirect()->intended('/');
}

?>

<x-layouts.main>

    <div class="flex flex-col items-stretch justify-center w-screen min-h-screen py-10 sm:items-center">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-5 text-2xl font-extrabold leading-9 text-center text-gray-800 dark:text-gray-200">Crea una nueva cuenta</h2>
            <div class="text-sm leading-5 text-center text-gray-600 dark:text-gray-400 space-x-0.5">
                <span>O</span>
                <x-ui.text-link href="{{ route('login') }}">inicia sesión si ya estas registrado</x-ui.text-link>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-10 py-0 sm:py-8 sm:shadow-sm sm:bg-white dark:sm:bg-gray-950/50 dark:border-gray-200/10 sm:border sm:rounded-lg border-gray-200/60">
                @volt('auth.register')
                    <form wire:submit="register" class="space-y-3">
                        <x-ui.input label="Nombre" type="text" id="name" name="name" wire:model="name" />
                        <x-ui.input label="Correo" type="email" id="email" name="email" wire:model="email" />
                        <x-ui.input label="Ciudad" type="text" id="city" name="city" wire:model="city" />
                        <x-ui.input label="Estado" type="text" id="state" name="state" wire:model="state" />
                        <x-ui.input label="País" type="text" id="country" name="country" wire:model="country" />
                        <x-ui.input label="Teléfono" type="text" id="phone" name="phone" wire:model="phone" />
                        <x-ui.input label="Dirección" type="text" id="address" name="address" wire:model="address" />
                        <x-ui.input label="Contraseña" type="password" id="password" name="password" wire:model="password" />
                        <x-ui.input label="Confirmar contraseña" type="password" id="password_confirmation" name="password_confirmation" wire:model="passwordConfirmation" />
                        <x-ui.button type="primary" rounded="md" submit="true">Register</x-ui.button>
                    </form>
                @endvolt
            </div>
        </div>
        
    </div>

</x-layouts.main>
