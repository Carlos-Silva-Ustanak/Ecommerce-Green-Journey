<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-green-700 dark:text-green-400">Meus Pedidos</h1>
    <div class="flex flex-col bg-white dark:bg-slate-900 p-5 rounded mt-4 shadow-lg dark:shadow-gray-800">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Pedido</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Data</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Status do Pedido</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Status do Pagamento</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Valor do Pedido</th>
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            @php
                            $status = '';
                            $payment_status = '';
                            if ($order->status == 'new') {
                              $status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">Novo</span>';
                            }   
                            if ($order->status == 'processing') {
                              $status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Em Processamento</span>';
                            } 
                            if ($order->status == 'shipped') {
                              $status = '<span class="bg-green-400 py-1 px-3 rounded text-white shadow">Enviado</span>';
                            }
                            if ($order->status == 'delivered') {
                              $status = '<span class="bg-green-500 py-1 px-3 rounded text-white shadow">Entregue</span>';
                            }
                            if ($order->status == 'cancelled') {
                              $status = '<span class="bg-red-700 py-1 px-3 rounded text-white shadow">Cancelado</span>';
                            }

                            if ($order->payment_status == 'pending') {
                              $payment_status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Pendente</span>';
                            }

                            if ($order->payment_status == 'paid') {
                              $payment_status = '<span class="bg-green-500 py-1 px-3 rounded text-white shadow">Pago</span>';
                            }
                            if ($order->payment_status == 'failed') {
                              $payment_status = '<span class="bg-red-700 py-1 px-3 rounded text-white shadow">Reembolsado</span>';
                            }
                            @endphp

                                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800" wire:key="{{$order->id}}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                        {{$order->id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{$order->created_at->format('d-m-Y')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {!!$status!!}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {!!$payment_status!!}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{Number::currency($order->grand_total, 'BRL')}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <a href="/my-orders/{{$order->id}}"
                                            class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-500 dark:bg-green-700 dark:hover:bg-green-600">Ver Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$orders->links()}}
        </div>
    </div>
</div>
