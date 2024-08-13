# Green Journey Store

Bem-vindo ao repositório da **Green Journey Store**, uma aplicação de e-commerce criada com Laravel.

## Índice

- [Visão Geral](#visão-geral)
- [Funcionalidades](#funcionalidades)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Uso](#uso)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Contribuição](#contribuição)
- [Licença](#licença)

## Visão Geral

A **Green Journey Store** é uma plataforma de e-commerce projetada para oferecer uma experiência de compra sustentável. A aplicação utiliza Laravel e Livewire para uma interface de usuário dinâmica e interativa.

## Funcionalidades

- **Autenticação de Usuários**: Login, registro e recuperação de senha.
- **Carrinho de Compras**: Adicione produtos ao carrinho e veja o resumo do pedido.
- **Processamento de Pagamentos**: Integração com Stripe para pagamentos online.
- **Modo Claro/Escuro**: Alternância entre temas claros e escuros para uma experiência personalizada.

## Instalação

Para instalar e rodar este projeto localmente, siga estas etapas:

1. Clone o repositório:
    ```sh
    git clone https://github.com/seu-usuario/green-journey-store.git
    cd green-journey-store
    ```

2. Instale as dependências do PHP e do Node.js:
    ```sh
    composer install
    npm install
    ```

3. Gere o arquivo `.env` e configure-o:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

## Configuração

1. Configure o banco de dados no arquivo `.env`.
2. Execute as migrações:
    ```sh
    php artisan migrate
    ```

3. Configure o Stripe no arquivo `.env`:
    ```env
    STRIPE_KEY=chave_do_stripe
    STRIPE_SECRET=segredo_do_stripe
    ```

## Uso

Para iniciar o servidor local, use:

```sh
php artisan serve
