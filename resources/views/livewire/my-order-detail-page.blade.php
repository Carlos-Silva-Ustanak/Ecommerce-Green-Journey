<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-green-700 dark:text-green-400">Detalhes do Pedido</h1>

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center h-[46px] w-[46px] bg-green-100 rounded-lg dark:bg-green-800">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Cliente</p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <div>{{ $address->full_name }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center h-[46px] w-[46px] bg-green-100 rounded-lg dark:bg-green-800">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 22h14" />
                        <path d="M5 2h14" />
                        <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                        <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                    </svg>
                </div>
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Data do Pedido</p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">{{ $order->created_at->format('d-m-Y') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center h-[46px] w-[46px] bg-green-100 rounded-lg dark:bg-green-800">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
                        <path d="m12 12 4 10 1.7-4.3L22 16Z" />
                    </svg>
                </div>
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Status do Pedido</p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        @php
                            $status = '';
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
                        @endphp
                        {!! $status !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center h-[46px] w-[46px] bg-green-100 rounded-lg dark:bg-green-800">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
                        <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
                        <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
                    </svg>
                </div>
                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Status de Pagamento</p>
                    </div>
                    <div class="mt-1 flex items-center gap-x-2">
                        @php
                            $payment_status = '';
                            if ($order->payment_status == 'pending') {
                              $payment_status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Pendente</span>';
                            }
                            if ($order->payment_status == 'paid') {
                              $payment_status = '<span class="bg-green-500 py-1 px-3 rounded text-white shadow">Pago</span>';
                            }
                            if ($order->payment_status == 'failed') {
                              $payment_status = '<span class="bg-red-700 py-1 px-3 rounded text-white shadow">Falhou</span>';
                            }
                        @endphp
                        {!! $payment_status !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        
    </div>
    <div class="flex flex-col md:flex-row gap-4 mt-4">
        <div class="md:w-3/4">
            <div class="bg-white dark:bg-slate-800 overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                <table class="w-full">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="text-left font-semibold text-gray-700 dark:text-gray-300 py-2">Produto</th>
                            <th class="text-left font-semibold text-gray-700 dark:text-gray-300 py-2">Preço</th>
                            <th class="text-left font-semibold text-gray-700 dark:text-gray-300 py-2">Quantidade</th>
                            <th class="text-left font-semibold text-gray-700 dark:text-gray-300 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_items as $item)
                            <tr wire:key="{{$item->id}}" class="border-b dark:border-gray-700">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        @php
                                            // Transform image URLs to S3 URL
                                            $s3Url = config('filesystems.disks.s3.url');
                                            $imageUrl = $item->product->images[0] ? $s3Url . '/' . str_replace('\\', '/', $item->product->images[0]) : '';
                                        @endphp
    
                                        <img class="h-16 w-16 mr-4" src="{{$imageUrl}}" alt="{{$item->name}}">
                                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{$item->product->name}}</span>
                                    </div>
                                </td>
                                <td class="py-4 text-gray-700 dark:text-gray-300">{{Number::currency($item->product->price, 'BRL')}}</td>
                                <td class="py-4 text-gray-700 dark:text-gray-300 text-center w-8">{{$item->quantity}}</td>
                                <td class="py-4 text-gray-700 dark:text-gray-300">{{Number::currency($item->total_amount, 'BRL')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="bg-white dark:bg-slate-800 overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                <h1 class="text-3xl font-bold text-green-700 dark:text-green-400 mb-3">Endereço de Entrega</h1>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-700 dark:text-gray-300">{{$address->street_address}}, {{$address->city}}, {{$address->state}}, {{$address->zip_code}}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700 dark:text-gray-300">Telefone:</p>
                        <p class="text-gray-700 dark:text-gray-300">{{$address->phone}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:w-1/4">
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4 text-green-700 dark:text-green-400">Resumo</h2>
                <div class="flex justify-between mb-2 text-gray-700 dark:text-gray-300">
                    <span>Subtotal</span>
                    <span>{{Number::currency($order->grand_total, 'BRL')}}</span>
                </div>
                <div class="flex justify-between mb-2 text-gray-700 dark:text-gray-300">
                    <span>Impostos</span>
                    <span>{{Number::currency(0, 'BRL')}}</span>
                </div>
                <div class="flex justify-between mb-2 text-gray-700 dark:text-gray-300">
                    <span>Frete</span>
                    <span>{{Number::currency(0, 'BRL')}}</span>
                </div>
                <hr class="my-2 border-gray-300 dark:border-gray-700">
                <div class="flex justify-between mb-2 text-gray-800 dark:text-gray-100 font-semibold">
                    <span>Total Geral</span>
                    <span>{{Number::currency($order->grand_total, 'BRL')}}</span>
                </div>
            </div>
        </div>
    </div>
    

</div>
