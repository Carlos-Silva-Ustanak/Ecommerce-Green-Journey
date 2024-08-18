<div>
    {{-- Hero Section Starts --}}
    <div class="w-full h-screen bg-gradient-to-r from-green-200 to-teal-200 py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid -->
            <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
                <div>
                    <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">
                        Embarque na jornada verde com <span class="text-green-600">Green Journey</span>
                    </h1>
                    <p class="mt-3 text-lg text-gray-800 dark:text-gray-400">
                        Explore um mundo de práticas sustentáveis e produtos ecológicos que ajudam a reduzir o impacto ambiental e promovem um estilo de vida mais verde.
                    </p>
                    <!-- Buttons -->
                    <div class="mt-7 grid gap-3 w-full sm:inline-flex">
                        <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{url('about')}}">
                            Saiba mais
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                        <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="mailto:greenjourney@support.com">
                            Entre em contato
                        </a>
                    </div>
                    <!-- End Buttons -->
                    <!-- Review -->
                    <div class="mt-6 lg:mt-10 grid grid-cols-2 gap-x-5">
                        <!-- Review -->
                        <div class="py-5">
                            <div class="flex space-x-1">
                                <svg class="h-4 w-4 text-gray-800 dark:text-gray-200" width="51" height="51"
                                    viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M27.0352 1.6307L33.9181 16.3633C34.2173 16.6768 34.5166 16.9903 34.8158 16.9903L50.0779 19.1845C50.9757 19.1845 51.275 20.4383 50.6764 21.0652L39.604 32.3498C39.3047 32.6632 39.3047 32.9767 39.3047 33.2901L41.998 49.2766C42.2973 50.217 41.1002 50.8439 40.5017 50.5304L26.4367 43.3208C26.1375 43.3208 25.8382 43.3208 25.539 43.3208L11.7732 50.8439C10.8754 51.1573 9.97763 50.5304 10.2769 49.59L12.9702 33.6036C12.9702 33.2901 12.9702 32.9767 12.671 32.6632L1.29923 21.0652C0.700724 20.4383 0.999979 19.4979 1.89775 19.4979L17.1598 17.3037C17.459 17.3037 17.7583 16.9903 18.0575 16.6768L24.9404 1.6307C25.539 0.69032 26.736 0.69032 27.0352 1.6307Z"
                                        fill="currentColor" />
                                </svg>
                                <!-- Repeat SVGs as needed -->
                            </div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-400">
                                "Adorei as dicas sustentáveis e o foco da Green Journey em práticas ecológicas. O conteúdo é sempre relevante e inspirador!"
                            </p>
                        </div>
                        <!-- End Review -->
                    </div>
                </div>
                <!-- End Text Section -->
                <!-- Image -->
                <div class="relative flex justify-center items-center md:ml-4">
                    <img class="relative z-10 max-w-[45rem] rounded-2xl border border-transparent shadow-md"
                        src="https://images.unsplash.com/photo-1506748686214e9df14f8b21f8a8e8c26cdb03e1397b2c0d4b67c71ebf3c0260?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8c3VzdGFpbmFiaWxpdHklMjBiYWNrZ3JvdW5kfGVufDB8fHx8MTY5NTI2Mzg4NA&ixlib=rb-1.2.1&q=80&w=1080"
                        alt="Green Journey">
                </div>
                <!-- End Image -->
            </div>
        </div>
    </div>
    {{-- Hero Section Ends --}}

    {{-- Brand Section Start --}}
    <section class="py-20">
        <div class="max-w-xl mx-auto">
            <div class="text-center">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200">
                        Descubra Nossas<span class="text-green-500"> Marcas Sustentáveis</span>
                    </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-green-200"></div>
                        <div class="flex-1 h-2 bg-green-400"></div>
                        <div class="flex-1 h-2 bg-green-600"></div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Explore nossa seleção de marcas que compartilham o compromisso com práticas sustentáveis e produtos ecológicos. Cada marca aqui representa um passo em direção a um futuro mais verde e consciente.
                </p>
            </div>
        </div>
        <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-5 md:grid-cols-3">
                @foreach ($brands->take(5) as $brand) <!-- Limit to 5 items -->
                    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{ $brand->id }}">
                        <a href="products?selected_brands[0]={{ $brand->id }}" class="">
                            <img src="{{ $brand->image }}" alt="{{ $brand->name }}"
                                class="object-cover w-full h-64 rounded-t-lg">
                        </a>
                        <div class="p-5 text-center">
                            <a href="products?selected_brands[0]={{ $brand->id }}"
                                class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                                {{ $brand->name }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Brand Section Ends --}}

    {{-- Category Section Starts --}}
    <div class="bg-green-200 py-20">
        <div class="max-w-xl mx-auto">
            <div class="text-center">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200">
                        Explore Nossas<span class="text-green-500"> Categorias</span>
                    </h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-green-200"></div>
                        <div class="flex-1 h-2 bg-green-400"></div>
                        <div class="flex-1 h-2 bg-green-600"></div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Descubra nossas categorias variadas, cada uma oferecendo uma gama de produtos ecológicos para atender suas necessidades sustentáveis. Navegue e encontre o que melhor se encaixa no seu estilo de vida verde.
                </p>
            </div>
        </div>
        <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-5 md:grid-cols-3">
                @foreach ($categories->take(5) as $category) <!-- Limit to 5 items -->
                    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{ $category->id }}">
                        <a href="products?selected_categories[0]={{ $category->id }}" class="">
                            <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                class="object-cover w-full h-64 rounded-t-lg">
                        </a>
                        <div class="p-5 text-center">
                            <a href="products?selected_categories[0]={{ $category->id }}"
                                class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                                {{ $category->name }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Category Section Ends --}}

    <div>
        {{-- Other sections go here --}}
    
@foreach($categories->take(5) as $category) <!-- Limit to 5 categories -->
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-xl mx-auto">
        <div class="text-center">
            <div class="relative flex flex-col items-center">
                <h2 class="text-4xl font-bold dark:text-gray-200">
                    {{ $category->name }}
                </h2>
                <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                    <div class="flex-1 h-2 bg-green-200"></div>
                    <div class="flex-1 h-2 bg-green-400"></div>
                    <div class="flex-1 h-2 bg-green-600"></div>
                </div>
            </div>
            <p class="mb-12 text-base text-center text-gray-500">
                Confira os produtos mais populares na categoria {{ $category->name }}.
            </p>
        </div>
    </div>
    <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-5 md:grid-cols-3">
            @foreach ($category->products->take(10) as $product) <!-- Limit to 10 products per category -->
                <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{ $product->id }}">
                    <a href="{{ url('products', $product->slug) }}">
                @php
                // Transform image URLs to S3 URL
                $s3Url = config('filesystems.disks.s3.url');
                $imageUrl = $product->images[0] ? $s3Url . '/' . str_replace('\\', '/', $product->images[0]) : '';
            @endphp        
                        <img src="{{ $imageUrl}}" alt="{{ $product->name }}"
                            class="object-cover w-full h-64 rounded-t-lg">
                    </a>
                    <div class="p-5 text-center">
                        <a href="{{ url('product', $product->id) }}"
                            class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                            {{ $product->name }}
                        </a>
                        <p class="mt-2 text-lg text-green-600">
                            R$ {{ number_format($product->price, 2, ',', '.') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center mt-8">
        <a href="{{ url('products') . '?selected_categories[0]=' . $category->id }}"
            class="py-3 px-6 text-white bg-green-600 rounded-lg hover:bg-green-700">
             Ver mais
         </a>
         
    </div>
</section>
@endforeach

{{-- Other sections go here --}}

    
</div>

