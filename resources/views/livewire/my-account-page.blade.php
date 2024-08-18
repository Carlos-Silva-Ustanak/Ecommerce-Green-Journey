<div class="w-full max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-semibold mb-8 text-green-700 dark:text-green-400">Minha Conta</h2>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-md dark:bg-green-800 dark:text-green-300 border border-green-200 dark:border-green-700">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updateProfile" class="space-y-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Nome</label>
            <input type="text" wire:model="name" id="name"
                class="p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-green-400">
            @error('name') <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">E-mail</label>
            <input type="email" wire:model="email" id="email"
                class="p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-green-400">
            @error('email') <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Senha Atual</label>
            <input type="password" wire:model="current_password" id="current_password"
                class="p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-green-400">
            @error('current_password') <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="new_password" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Nova Senha</label>
            <input type="password" wire:model="new_password" id="new_password"
                class="p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-green-400">
            @error('new_password') <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Confirmar Nova Senha</label>
            <input type="password" wire:model="new_password_confirmation" id="new_password_confirmation"
                class="p-3 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-green-400">
            @error('new_password_confirmation') <span class="text-red-500 text-sm dark:text-red-400">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-3 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:bg-green-500 dark:hover:bg-green-600">
                Atualizar Perfil
            </button>
        </div>
    </form>
</div>
