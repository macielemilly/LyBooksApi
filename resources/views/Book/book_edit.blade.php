<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>

<body>

    @extends('nav')

    <div class="py-60 px-100 sm:ml-80">

        <div style="background-color:white; box-shadow: 0 4px 5px rgba(0, 0, 0, 0.267);" class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div style="background-color:#013C3C;" class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 style="color:white" class="text-xl font-semibold text-gray-900">Editar Livro</h3>
            </div>

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">{{ $error }}</strong>
                <span onclick="this.parentElement.remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
                    <svg class="fill-current h-6 w-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
            @endforeach
            @endif

            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('books.update', ['book' => $book->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nome -->
                    <div>
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome do Livro <span class="text-red-600">*</span></label>
                        <input type="text" name="nome" id="nome" value="{{ old('nome', $book->nome) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5" required>
                    </div>

                    <!-- Autor -->
                    <div>
                        <label for="author_id" class="block mb-2 text-sm font-medium text-gray-900">Autor</label>
                        <select name="author_id" id="author_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                            <option value="">Selecione um autor</option>
                            @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                {{ $author->nome }}
                            </option> @endforeach
                        </select>
                    </div>

                    <!-- Linguagem -->
                    <div>
                        <label for="linguagem_id" class="block mb-2 text-sm font-medium text-gray-900">Linguagem</label>
                        <select name="linguagem_id" id="linguagem_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                            <option value="">Selecione uma linguagem</option>
                            @foreach($languages as $language)
                            <option value="{{ $language->id }}" {{ $book->linguagem_id == $language->id ? 'selected' : '' }}>{{ $language->idioma }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Gênero -->
                    <div>
                        <label for="genero_id" class="block mb-2 text-sm font-medium text-gray-900">Gênero</label>
                        <select name="genero_id" id="genero_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                            <option value="">Selecione um gênero</option>
                            @foreach($generos as $genero)
                            <option value="{{ $genero->id }}" {{ $book->genero_id == $genero->id ? 'selected' : '' }}>{{ $genero->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Editora -->
                    <div>
                        <label for="editor_id" class="block mb-2 text-sm font-medium text-gray-900">Editora</label>
                        <select name="editor_id" id="editor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5">
                            <option value="">Selecione uma editora</option>
                            @foreach($editoras as $editor)
                            <option value="{{ $editor->id }}" {{ $book->editor_id == $editor->id ? 'selected' : '' }}>{{ $editor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botões -->
                    <button type="submit" style="background-color:#035353;" class="w-full text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar Alterações</button>

                    <a href="{{ route('books.index') }}">
                        <button type="button" style="background-color:white; color:black;" class="w-full border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-2 text-center">Voltar</button>
                    </a>
                </form>

            </div>
        </div>

    </div>
</body>

</html>