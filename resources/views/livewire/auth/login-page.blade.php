<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center justify-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-md">
                <div class="p-6">
                    <div class="text-center">
                        <h1 class="text-2xl font-bold text-gray-800">Entrar</h1>
                        <p class="mt-2 text-sm text-gray-600">
                            Não tem uma conta?
                            <a wire:navigate
                                class="text-green-600 hover:underline font-medium"
                                href="/register">
                                Cadastre-se aqui
                            </a>
                        </p>
                    </div>

                    <hr class="my-5 border-gray-300">

                    <!-- Mensagem de erro -->
                    @if (session('error'))
                        <div class="text-red-600 text-xs mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Formulário -->
                    <form wire:submit.prevent='save'>
                        <div class="grid gap-y-4">
                            <!-- Grupo de Formulário -->
                            <div>
                                <label for="email" class="block text-sm mb-2 text-gray-800">Endereço de e-mail</label>
                                <div class="relative">
                                    <input wire:model='email' type="email" id="email" 
                                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-describedby="email-error">
                                    @error('email')
                                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                        <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                    @enderror
                                </div>
                                @error('email')
                                <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Fim do Grupo de Formulário -->

                            <!-- Grupo de Formulário -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="password" class="block text-sm mb-2 text-gray-800">Senha</label>
                                    <a wire:navigate
                                        class="text-sm text-green-600 hover:underline font-medium"
                                        href="/forgot">Esqueceu sua senha?</a>
                                </div>
                                <div class="relative">
                                    <input type="password" id="password" wire:model='password'
                                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none"
                                        aria-describedby="password-error">
                                    @error('password')
                                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                        <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                    @enderror
                                </div>
                                @error('password')
                                <p class="text-xs text-red-600 mt-2" id="password-error">8+ caracteres necessários</p>
                                @enderror
                            </div>
                            <!-- Fim do Grupo de Formulário -->

                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">Entrar</button>
                        </div>
                    </form>
                    <!-- Fim do Formulário -->
                </div>
            </div>
        </main>
    </div>
</div>
