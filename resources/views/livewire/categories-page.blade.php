<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Categorias</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <a class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-lg transition-transform transform hover:scale-105 dark:bg-gray-800 dark:border-gray-700 dark:hover:shadow-md dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-green-300"
                    href="/products?selected_categories[0]={{ $category->id }}" wire:key="{{ $category->id }}">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <img class="h-20 w-20 object-cover rounded-md" src="{{ url('storage', $category->image) }}"
                                alt="{{ $category->name }}">
                            <div class="ms-4">
                                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 group-hover:text-green-600">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex justify-end mt-auto">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-300 group-hover:text-green-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
