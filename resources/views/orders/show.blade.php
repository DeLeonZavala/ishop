<x-app-layout>
    <div class="container py-12">
        <div class="bg-whire rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span> Orden {{ $order->id }}</p>
        </div>

        <div class="bg-whire rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>

                    @if ($order->shipping_type == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda:</p>
                        <p class="text-sm">Skrrrr</p>
                    @else
                        <p class="text-sm">Los productos seran enviados a:</p>
                        <p class="text-sm">{{ $order->address }}</p>
                        <p>{{ $order->department->name }} - {{ $order->city->name }} - {{ $order->district->name }}</p>
                    @endif
                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recibirá el producto: {{ $order->contact }}</p>
                    <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
                </div>
            </div>
        </div>

        <div class="bg-whire rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>
            <table class="table-aout w-full">
                <th>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant.</th>
                        <th>Total</th>
                    </tr>
                </th>

                <tbody class="divid-y divide-gray-300">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" 
                                        src="{{ $item->options->image }}" 
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">
                                            @isset ($item->options->color)
                                                Color: {{__($item->options->color)}}
                                            @endisset

                                            @isset ($item->options->size)
                                                - {{ $item->options->size }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>
                            <td class="text-center"> 
                                US$ {{ $item->price }}
                            </td>
                            <td class="text-center">
                                {{ $item->qty }}
                            </td>
                            <td class="text-center">
                                US$ {{ $item->price * $item->qty}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 flex justify-between items-center">
            <img class="h-20 " src="{{ asset('img/paymen-cards.png') }}" alt="">
            <div class="text-gray-700">
                <p class="text-sm font-semibold ">
                    Subtotal: US$ {{ $order->total - $order->shipping_cost}}
                </p>
                <p class="text-sm font-semibold ">
                    Envio: US$ {{ $order->shipping_cost }}.00
                </p>
                <p class="text-lg font-semibold uppercase">
                    total: US$ {{ $order->total }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>