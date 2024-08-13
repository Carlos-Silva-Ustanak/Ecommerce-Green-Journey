<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-white dark:bg-gray-900 font-poppins rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <!-- Filtros Laterais -->
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <!-- Categoria -->
                    <div class="p-4 mb-5 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-300">Categorias</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-green-500 dark:border-green-400"></div>
                        <ul>
                            @foreach ($categories as $category)
                                <li class="mb-4" wire:key="{{$category->id}}">
                                    <label for="{{$category->slug}}" class="flex items-center text-gray-700 dark:text-gray-300">
                                        <input type="checkbox" wire:model.live="selected_categories" value="{{$category->id}}" id="{{$category->slug}}" class="w-4 h-4 mr-2">
                                        <span class="text-lg">{{$category->name}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Marca -->
                    <div class="p-4 mb-5 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-300">Marcas</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-green-500 dark:border-green-400"></div>
                        <ul>
                            @foreach ($brands as $brand)
                                <li class="mb-4" wire:key="{{$brand->id}}">
                                    <label for="{{$brand->slug}}" class="flex items-center text-gray-700 dark:text-gray-300">
                                        <input type="checkbox" wire:model.live="selected_brands" value="{{$brand->id}}" id="{{$brand->slug}}" class="w-4 h-4 mr-2">
                                        <span class="text-lg">{{$brand->name}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Status do Produto -->
                    <div class="p-4 mb-5 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-300">Status do Produto</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-green-500 dark:border-green-400"></div>
                        <ul>
                            <li class="mb-4">
                                <label for="featured" class="flex items-center text-gray-700 dark:text-gray-300">
                                    <input type="checkbox" id="featured" value="1" wire:model.live="featured" class="w-4 h-4 mr-2">
                                    <span class="text-lg">Produtos em Destaque</span>
                                </label>
                            </li>
                            <li class="mb-4">
                                <label for="on_sale" class="flex items-center text-gray-700 dark:text-gray-300">
                                    <input type="checkbox" id="on_sale" value="1" wire:model.live="on_sale" class="w-4 h-4 mr-2">
                                    <span class="text-lg">Em Promoção</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Faixa de Preço -->
                    <div class="p-4 mb-5 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                        <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-300">Preço</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-green-500 dark:border-green-400"></div>
                        <div>
                            <div class="font-semibold text-green-600 dark:text-green-400">{{Number::currency($price_range, 'BRL')}}</div>
                            <input type="range" wire:model.live="price_range" class="w-full h-1 mb-4 bg-green-100 dark:bg-green-700 rounded cursor-pointer" max="500" min="10" value="500" step="1">
                            <div class="flex justify-between">
                                <span class="inline-block text-lg font-bold text-blue-500 dark:text-blue-400">{{Number::currency(10, 'BRL')}}</span>
                                <span class="inline-block text-lg font-bold text-blue-500 dark:text-blue-400">{{Number::currency(500, 'BRL')}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produtos -->
                <div class="w-full px-3 lg:w-3/4">
                    <!-- Filtro de Classificação -->
                    <div class="px-3 mb-4">
                        <div class="items-center justify-between hidden px-3 py-2 bg-gray-200 dark:bg-gray-700 md:flex">
                            <div class="flex items-center justify-between">
                                <select wire:model.live="sort" class="block w-40 text-base bg-gray-200 dark:bg-gray-700 cursor-pointer">
                                    <option value="latest">Ordenar por mais recentes</option>
                                    <option value="price">Ordenar por Preço</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Lista de Produtos -->
                    <div class="flex flex-wrap items-center">
                        @foreach ($products as $product)
                            <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $product->id }}">
                                <div class="border border-gray-300 dark:border-gray-700 rounded-lg">
                                    <div class="relative bg-gray-200 dark:bg-gray-800">
                                        <a href="/products/{{ $product->slug }}">
                                            <img src="{{ url('storage', $product->images[0]) }}" alt="{{ $product->name }}" class="object-cover w-full h-56 mx-auto">
                                        </a>
                                    </div>
                                    <div class="p-3">
                                        <div class="flex items-center justify-between gap-2 mb-2">
                                            <h3 class="text-xl font-medium text-gray-700 dark:text-gray-300">{{ $product->name }}</h3>
                                        </div>
                                        <p class="text-lg">
                                            <span class="text-green-600 dark:text-green-400">{{ Number::currency($product->price, 'BRL') }}</span>
                                        </p>
                                    </div>
                                    <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">
                                        <a wire:click.prevent='addToCart({{$product->id}})' href="#" class="text-gray-500 dark:text-gray-400 flex items-center space-x-2 hover:text-green-600 dark:hover:text-green-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3" viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                            </svg>
                                            <span wire:loading.remove wire:target="addToCart({{$product->id}})">Adicionar ao Carrinho</span>
                                            <span wire:loading wire:target="addToCart({{$product->id}})">Adicionando</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Paginação -->
                    <div class="flex justify-end mt-6">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
