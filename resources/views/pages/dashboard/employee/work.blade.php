<?php

use function Laravel\Folio\{middleware, name};
//use function Livewire\Volt\{state};

name('work');

?>

<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Trabajador') }}
        </h2>
    </x-slot>

    <section>
        <div class="grid max-w-screen-xl grid-cols-3 gap-12 pt-12 mx-auto">
            @foreach ($serviceRequests as $serviceRequest )
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-xl">
                    <form action="{{ route('services.update', $serviceRequest->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <span class="inline-flex items-center justify-center px-2 py-1 mb-4 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">No asignado</span>
                        </div>
                        <div>
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $serviceRequest->user->name }}</h5>
                        </div>
                        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Este cliente solicita el servicio de {{  $serviceRequest->service->name }}</p>
                        <input type="hidden" name="service_id" value="{{ $serviceRequest->id }}">
                        <button type="submit" class="inline-flex items-center px-2 py-1 text-gray-900 duration-500 bg-gray-100 border border-gray-500 rounded-lg hover:bg-gray-900 hover:text-white">
                            Tomar servicio
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-screen-xl mx-auto">
            <div class="relative overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full text-left text-gray-500 text-md rtl:text-right">
                    <thead class="text-gray-700 uppercase shadow-2xl text-md bg-zinc-200 rounded-xl ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Cliente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Dirección
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Celular
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Servicio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        @foreach ($workerServices as $workerService)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $workerService->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{  $workerService->user->address . ', ' . $workerService->user->city . ', ' . $workerService->user->state . ', ' . $workerService->user->country  }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $workerService->user->phone }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $workerService->service->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $workerService->status }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($workerService->status == 'en proceso')
                                        <form action="{{ route('services.finish', $workerService->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="service_id" value="{{ $serviceRequest->id }}">
                                            <button type="submit" class="inline-flex items-center px-2 py-2 font-bold leading-none text-white duration-500 bg-red-600 border rounded-md">
                                                Finalizar servicio
                                            </button>
                                        </form>
                                    @else
                                        <span class="inline-flex items-center justify-center px-2 py-1 mb-4 text-xs font-bold leading-none text-red-100 bg-green-600 rounded-full">Finalizado</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
</x-layouts.app>