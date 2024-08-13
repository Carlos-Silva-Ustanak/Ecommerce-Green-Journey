<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Carrinho de Compras</h1>
    
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Carrinho de Compras -->
        <div class="lg:w-3/4 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 border border-gray-200 p-6 mb-4">
            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="text-left font-semibold py-2 text-gray-900 dark:text-gray-100">Produto</th>
                        <th class="text-left font-semibold py-2 text-gray-900 dark:text-gray-100">Preço</th>
                        <th class="text-left font-semibold py-2 text-gray-900 dark:text-gray-100">Quantidade</th>
                        <th class="text-left font-semibold py-2 text-gray-900 dark:text-gray-100">Total</th>
                        <th class="text-left font-semibold py-2 text-gray-900 dark:text-gray-100">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart_items as $item)
                        <tr wire:key="{{ $item['product_id'] }}">
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img class="h-16 w-16 mr-4" src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
                                    <span class="font-semibold truncate w-32 sm:w-auto text-gray-900 dark:text-gray-100">{{ $item['name'] }}</span>
                                </div>
                            </td>
                            <td class="py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                                {{ Number::currency($item['unit_amount'], 'BRL') }}
                            </td>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <button class="border rounded-md py-2 px-4 mr-2 text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700" wire:click='decreaseQty({{ $item['product_id'] }})'>-</button>
                                    <span class="text-center w-8">{{ $item['quantity'] }}</span>
                                    <button class="border rounded-md py-2 px-4 ml-2 text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700" wire:click='increaseQty({{ $item['product_id'] }})'>+</button>
                                </div>
                            </td>
                            <td class="py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                                {{ Number::currency($item['total_amount'], 'BRL') }}
                            </td>
                            <td>
                                <button
                                 wire:click='removeItem({{ $item['product_id'] }})' class="bg-red-500 text-white border-2 border-red-700 rounded-lg px-3 py-1 hover:bg-red-600 dark:border-red-600 dark:bg-red-600 dark:hover:bg-red-700" wire:loading.remove wire:target='removeItem({{ $item['product_id'] }})'>
                                 <span>Remover</span>
                                 <span wire:target='removeItem({{ $item['product_id'] }})' wire:loading>Removendo...</span></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-4xl font-semibold text-gray-500 dark:text-gray-400">Nenhum item disponível no carrinho!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Resumo da Compra -->
        <div class="lg:w-1/4 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 border border-gray-200 p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Resumo</h2>
            <div class="flex justify-between mb-2 text-gray-900 dark:text-gray-100">
                <span>Subtotal</span>
                <span>{{ Number::currency($grand_total, 'BRL') }}</span>
            </div>
            <div class="flex justify-between mb-2 text-gray-900 dark:text-gray-100">
                <span>Impostos</span>
                <span>{{ Number::currency(0, 'BRL') }}</span>
            </div>
            <div class="flex justify-between mb-2 text-gray-900 dark:text-gray-100">
                <span>Frete</span>
                <span>{{ Number::currency(0, 'BRL') }}</span>
            </div>
            <hr class="my-2 border-gray-200 dark:border-gray-700">
            <div class="flex justify-between mb-2 text-gray-900 dark:text-gray-100">
                <span class="font-semibold">Total</span>
                <span class="font-semibold">{{ Number::currency($grand_total, 'BRL') }}</span>
            </div>
            @if ($cart_items)
                <a href="/checkout" class="block text-center bg-green-600 text-white py-2 px-4 rounded-lg mt-4 w-full hover:bg-green-700">Finalizar Compra</a>
            @endif
        </div>
    </div>
</div>
