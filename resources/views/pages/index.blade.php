<?php

use function Laravel\Folio\{middleware, name};

name('home');
middleware(['redirect-to-dashboard']);

?>

<x-layouts.marketing>

    <section class="pt-16 overflow-hidden bg-gray-100 sm:grid sm:grid-cols-2 sm:items-center">
        <div class="p-8 md:p-12 lg:px-16 lg:py-24">
            <div class="max-w-xl mx-auto text-center ltr:sm:text-left rtl:sm:text-right">
                <h2 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 lg:text-6xl">
                    Brindamos los mejores servicios
                </h2>
                <p class="hidden text-lg text-gray-800 md:mt-4 md:block">
                    Conoce nuestros servicios y solicitalos en linea de manera fácil y rápida. ¿Quieres formar parte
                    de nuestro equipo? ¡Postulate!
                </p>
                <div class="mt-4 md:mt-8">
                <a
                    href="{{ route('register') }}"
                    class="inline-block px-12 py-3 text-sm font-medium text-white transition rounded bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-yellow-400"
                >
                    Conocenos
                </a>
                </div>
            </div>
        </div>
    
        <img
        alt="toolkit"
        src="{{ asset('assets/images/tool_2.jpg') }}"
        class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px]"
        />
    </section>

    <section class="py-24 bg-gray-100 font-poppins">
        <div class="max-w-screen-xl px-4 py-8 mx-auto mt-4 xs:py-5 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h1 class="mb-6 text-4xl font-extrabold leading-none tracking-tight text-gray-900 lg:text-5xl">¿Por qué somos la <span class="underline underline-offset-3 decoration-8 decoration-green-500">mejor opción</span>?</h1>
                <p class="text-zinc-950 lg:text-lg">En RenewOnline ofrecemos una gran variedad de servicios como fontaneria, plomeria, soldadura ¡Y más!</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div class="p-4 shadow-xl">
                    <div class="flex items-center justify-center w-10 h-10 mb-4 bg-black rounded-full lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold tracking-tight">Seleccione tu servicio</h3>
                    <p class="text-zinc-950">Con nuestra gran variedad de servicios puedes seleccionar el que necesites en el momento que necesites.</p>
                </div>
                <div class="p-4 shadow-xl">
                    <div class="flex items-center justify-center w-10 h-10 mb-4 bg-black rounded-full lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold tracking-tight">Siempre a tu lado</h3>
                    <p class="text-zinc-950">¿Problemas en la media noche? No te preocupes te atenderemos a las primeras horas del día y atenderemos tu ticket rápido.</p>
                </div>
                <div class="p-4 shadow-xl">
                    <div class="flex items-center justify-center w-10 h-10 mb-4 bg-black rounded-full lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold tracking-tight">¿Buscas trabajo?</h3>
                    <p class="text-zinc-950">No solo ofrecemos nuestros servicios, también puedes postularte para formar parte de nuestro equipo especificando tu área.</p>
                </div>
                <div class="p-4 shadow-xl">
                    <div class="flex items-center justify-center w-10 h-10 mb-4 bg-black rounded-full lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold tracking-tight">Pagos después del trabajo</h3>
                    <p class="text-zinc-950">No hay cargos recurrentes, ni cuotas de afiliación u otros cargos ocultos.</p>
                </div>
            </div>
        </div>
    </section>

    <x-ui.marketing.footer />

</x-layouts.marketing>
