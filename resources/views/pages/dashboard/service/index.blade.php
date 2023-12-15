<?php

use function Laravel\Folio\{middleware, name};
//use function Livewire\Volt\{state};

name('servicios');

?>

<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Servicios') }}
        </h2>
    </x-slot>

    <section>
        <div class="grid max-w-screen-xl grid-cols-3 gap-12 pt-12 mx-auto">
            @foreach ($services as $service )
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 01-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 11-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 016.336-4.486l-3.276 3.276a3.004 3.004 0 002.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008z" />
                    </svg>
                    <div>
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $service->name }}</h5>
                    </div>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Solicita nuestro servicio y en el transcurso del dia se te asignara un encargado.</p>
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <button type="button" data-service-id="{{ $service->id }}" data-modal-target="static-modal" data-modal-toggle="static-modal" class="inline-flex items-center text-blue-600 hover:underline">
                        Solicitar servicio
                        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
        

        <!-- Main modal -->
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Realizar pago
                        </h3>
                        <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 space-y-4 md:p-5">
                        <div class="flex mb-3 -mx-2">
                            <div class="px-2">
                                <label for="type1" class="flex items-center cursor-pointer">
                                    <input type="radio" class="w-5 h-5 text-indigo-500 form-radio" name="type" id="type1" checked>
                                    <img src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" class="h-8 ml-3">
                                </label>
                            </div>
                            <div class="px-2">
                                <label for="type2" class="flex items-center cursor-pointer">
                                    <input type="radio" class="w-5 h-5 text-indigo-500 form-radio" name="type" id="type2">
                                    <img src="https://www.sketchappsources.com/resources/source-image/PayPalCard.png" class="h-8 ml-3">
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2 ml-1 text-sm font-bold">Titular</label>
                            <div>
                                <input class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500" placeholder="John Smith" type="text"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2 ml-1 text-sm font-bold">Numero de tarjeta</label>
                            <div>
                                <input class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500" placeholder="0000 0000 0000 0000" type="text"/>
                            </div>
                        </div>
                        <div class="flex items-end mb-3 -mx-2">
                            <div class="w-1/2 px-2">
                                <label class="mb-2 ml-1 text-sm font-bold">Fecha de expiración</label>
                                <div>
                                    <select class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md cursor-pointer form-select focus:outline-none focus:border-indigo-500">
                                        <option value="01">01 - January</option>
                                        <option value="02">02 - February</option>
                                        <option value="03">03 - March</option>
                                        <option value="04">04 - April</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - June</option>
                                        <option value="07">07 - July</option>
                                        <option value="08">08 - August</option>
                                        <option value="09">09 - September</option>
                                        <option value="10">10 - October</option>
                                        <option value="11">11 - November</option>
                                        <option value="12">12 - December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-1/2 px-2">
                                <select class="w-full px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md cursor-pointer form-select focus:outline-none focus:border-indigo-500">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-10">
                            <label class="mb-2 ml-1 text-sm font-bold">Código de seguridad</label>
                            <div>
                                <input class="w-32 px-3 py-2 mb-1 transition-colors border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500" placeholder="000" type="text"/>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <form action="{{ route('services.create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value="">

                        <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                            <button data-modal-hide="static-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pagar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>

    <section class="py-24">
        <div class="max-w-screen-xl mx-auto">
            <div class="relative overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                    <thead class="text-lg text-gray-700 uppercase shadow-2xl bg-zinc-200 rounded-xl ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Servicio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Empleado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Solicitado
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        @foreach ($requestServices as $requestService)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $requestService->service->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($requestService)
                                        <span class="text-black">{{ $requestService->employee->user->name }}</span>
                                    @else
                                        <span class="text-red-500">Sin asignar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $requestService->status }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $requestService->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const serviceButtons = document.querySelectorAll('[data-modal-toggle="static-modal"]');
            const modal = document.getElementById('static-modal');

            serviceButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const serviceId = this.getAttribute('data-service-id');
                    // Ahora, puedes usar el serviceId como sea necesario.
                    
                    // Puedes asignar el serviceId a un campo oculto en el modal, por ejemplo.
                    const serviceIdInput = modal.querySelector('[name="service_id"]');
                    serviceIdInput.value = serviceId;
                });
            });
        });
    </script>

</x-layouts.app>