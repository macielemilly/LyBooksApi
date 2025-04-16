<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gênero</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>
<body>

@extends('nav')


<div class="py-60 px-100 sm:ml-80">
    <div style="background-color:white; box-shadow: 0 4px 5px rgba(0, 0, 0, 0.267);" class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div style="background-color:#013C3C;"class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
            <h3 style="color:white" class="text-xl font-semibold text-gray-900">
                Editar Editora
            </h3>
        </div>

        @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="bg-red-100 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">{{ $error }}</strong>
        <span onclick="this.parentElement.remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Close</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
    </div>
    @endforeach
@endif
        <!-- Modal body -->
        <div class="p-4 md:p-5">
        <form class="space-y-4" action="{{ route('generos.update', ['genero' => $generos->id])}}" method='post'>
                @csrf
                    <div>
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome da Editora<span style="color:red; margin-left:5px;">*</span></label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                          value="{{$generos->nome}}" type="text" id="nome" name="nome" placeholder="Nome"/>
                          <input type="hidden" name="_method" value="PUT">
                    </div>
                    <button style="background-color:#035353;" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="criar">Editar
                    </button>
                    <a href="{{route('generos.index')}}">
                    <button style="background-color:white; color:black;" type="button" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="criar">Voltar
                    </button>
                    </a>
                </form>
        </div>
    </div>
   </div>
</body>
