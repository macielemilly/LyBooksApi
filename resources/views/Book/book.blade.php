<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>

<body>

@extends('nav')

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center">
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <!-- Modal content -->
    <div class="relative p-4 w-full max-w-md max-h-full z-10 bg-white rounded-lg shadow-sm">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900">Criar Livro</h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Fechar modal</span>
            </button>
        </div>

        <!-- Modal body -->
        <div class="p-4 md:p-5">
            <form class="space-y-4" action="{{ route('books.store') }}" method="POST">
            @csrf
                <!-- Nome do livro -->
                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome do Livro <span style="color:red;">*</span></label>
                    <input name="nome" id="nome" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nome do livro" />
                </div>

                <!-- Autor -->
                <div>
                    <label for="author_id" class="block mb-2 text-sm font-medium text-gray-900">Autor</label>
                    <select name="author_id" id="author_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="">Selecione um autor</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Linguagem -->
                <div>
                    <label for="language_id" class="block mb-2 text-sm font-medium text-gray-900">Linguagem</label>
                    <select name="language_id" id="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="">Selecione uma linguagem</option>
                        @foreach($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->idioma }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Gênero -->
                <div>
                    <label for="genero_id" class="block mb-2 text-sm font-medium text-gray-900">Gênero</label>
                    <select name="genero_id" id="genero_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="">Selecione um gênero</option>
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="editor_id" class="block mb-2 text-sm font-medium text-gray-900">Editora</label>
                    <select name="editor_id" id="editor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="">Selecione uma editora</option>
                        @foreach($editoras as $editor)
                            <option value="{{ $editor->id }}">{{ $editor->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botão -->
                <div class="flex justify-end">
                <button style="background-color:#035353;"type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</button>
                </div>
                @csrf

            </form>
        </div>
    </div>
</div>

<!-- Conteúdo principal -->
<div class="p-4 sm:ml-80">
    <div class="tabela p-4 border-2 border-gray-200 border-dashed rounded-lg mt-5">
        <div class="topo flex justify-between items-center">
            <h1>Livros!</h1>
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2.5 rounded-lg">Adicionar</button>
        </div>

        <!-- Mensagens -->
        @if(session()->has('message'))
            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4">
                <span class="block sm:inline"> {{ session()->get('message') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg id="close-alert" class="fill-current h-6 w-6 text-green-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 mt-4">
                    <strong class="font-bold">{{ $error }}</strong>
                    <span onclick="this.parentElement.remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
                        <svg class="fill-current h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                        </svg>
                    </span>
                </div>
            @endforeach
        @endif

        <!-- Lista de livros -->
        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($books as $book)
                <div style="background-color:#D09953; box-shadow: 0 4px 5px rgba(0, 0, 0, 0.267);" class="p-3 rounded-lg">
                    <div style="background-color:white;" class="cartao relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-400">
                        <div class="p-5">
                            <div class="itens_cartoes">
                                <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900">{{$book->nome}}</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700">Autor: {{ $author->nome }}</p>
                            <p class="mb-3 font-normal text-gray-700">Linguagem: {{ $language->idioma }}</p>
                            <p class="mb-3 font-normal text-gray-700">Gênero: {{ $genero->nome }}</p>
                            <p class="mb-3 font-normal text-gray-700">Editora: {{ $editor->nome }}</p>

                            <div class="botao_tab flex gap-2">
                                <a href="{{ route('books.edit', ['book' => $book->id]) }}">
                                    <button class="editar">Editar</button>
                                </a>
                                <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="deletar text-red-600 hover:text-red-800">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('authentication-modal');
        const openModalButton = document.querySelector('[data-modal-target="authentication-modal"]');
        const closeModalButton = document.querySelector('[data-modal-hide="authentication-modal"]');

        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        const closeButton = document.getElementById('close-alert');
        const alertBox = document.getElementById('alert');

        if (closeButton && alertBox) {
            closeButton.addEventListener('click', () => {
                alertBox.style.display = 'none';
            });
        }
    });
</script>

</body>
</html>
