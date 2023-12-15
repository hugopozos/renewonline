<?php

use function Laravel\Folio\{middleware, name};
//use function Livewire\Volt\{state};

name('employee');

?>

<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Solicitar empleo') }}
        </h2>
    </x-slot>

    <section class="h-screen bg-gray-100">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2 lg:py-12">
                    <h1 class="pb-8 text-4xl font-black text-green-600">Formulario de solicitud</h1>
                    <p class="max-w-xl text-lg">
                        Constantemente buscamos mejores oportunidades para todos nuestros empleados, si deseas formar parte de nuestro equipo de trabajo, no dudes en contactarnos.
                        Forma parte de nuestra increible familia y obten increibles beneficios.
                    </p>
            
                    <div class="mt-8">
                        <p href="" class="text-2xl font-bold text-green-600"> 0151 475 4450 </p>
                        <address class="mt-2 not-italic">Andador Via Lactea, Veracruz. CP. 58517</address>
                    </div>
                </div>
        
                <div class="p-8 bg-green-500 rounded-lg shadow-lg lg:col-span-1 lg:p-2">
                    <form action="{{ route('employee.create') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="service_id" class="block mb-2 text-lg font-bold text-white">Area de especialidad</label>
                            <select name="service_id" id="service_id" class="px-3 py-2 rounded-lg">
                                <option selected disabled class="text-black">Selecciona una opcion</option>
                                @foreach ($services as $service)
                                    <option class="text-black" value="{{ $service->id }}">{{ $service->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="px-24 py-2 bg-white rounded-lg hover:bg-gray-300">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>