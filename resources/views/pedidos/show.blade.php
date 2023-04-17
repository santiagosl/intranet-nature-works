<x-app-layout>

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

    <section class="mt-20 antialiased bg-gray-100 text-gray-600 h-screen px-4" x-data="app">
        <div class="flex flex-col  h-full">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="font-semibold text-gray-800">Información</div>
                </header>

                <div class="overflow-x-auto p-3">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Fecha</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Referencia</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <tr>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{ $pedido->fecha_creacion }}
                                    </div>
                                </td>

                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">
                                        {{ $pedido->referencia }}
                                    </div>
                                </td>
                            </tr>

                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Nº de albaran</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Notas</div>
                                    </th>
                                </tr>
                            </thead>

                        <tbody class="text-sm divide-y divide-gray-100">

                            <tr>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{ $pedido->n_albaran }}
                                    </div>
                                </td>

                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">
                                        {{ $pedido->observaciones }}
                                    </div>
                                </td>
                            </tr>

                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Material Comercial</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Transporte</div>
                                    </th>
                                </tr>
                            </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <tr>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{ $pedido->material_comercial }}
                                    </div>
                                </td>

                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">
                                        {{ $pedido->transporte }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                            
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Confirmación</div>
                                </th>
                                <th class="p-2">
                                    <div class="font-semibold text-left">Ok recogida</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">

                            <tr>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{ $pedido->fecha_recogida }}
                                    </div>
                                </td>

                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">
                                        {{ $pedido->confirmacion_recogida }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                   </table>

                   <table class="table-auto w-full mt-5">
                    @foreach ($pdf as $item)
                    <thead  class="text-xs font-semibold uppercase text-gray-400 bg-green-50">
                        <tr>
                            <th colspan="2" class="p-2">
                                <div class="font-semibold text-left">Documentacion</div>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                        <tr>
                         
                        <td class="p-2">
                            <a href="storage/{{$item->url}}">Albaran</a>
                        </td>
                           
                        </tr>
                    </tbody>
                    @endforeach
                   </table>

                </div>
                <div class="lg:w-full sm:w-full">
                    <a href="{{route('pedidos.index')}}"  class="w-full text-center inline-block rounded bg-blue-300 px-2 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">
                        Volver
                    </a>
                </div>
            </div>

    </section>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("app", () => ({
                total: 0,
                selected: [],

                toggleCheckbox(element, amount) {
                    if (element.checked) {
                        this.selected.push(element.value);
                        this.total += amount;
                    } else {
                        const index = this.selected.indexOf(element.value);

                        if (index > -1) this.selected.splice(index, 1);

                        this.total -= amount;
                    }
                },
            }));
        });
    </script>
</x-app-layout>
