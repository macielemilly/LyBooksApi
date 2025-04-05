
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Editoras</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>
<body>
    
@extends('nav')

<div class="p-4 sm:ml-64">
   <div style="background-color:#F5F2E7; box-shadow: 0 4px 5px rgba(0, 0, 0, 0.267);" class="mt-20 p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900">
                Editar Editora
            </h3>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
        <form class="space-y-4" action="{{ route('editoras.update', ['editor' => $editoras->id])}}" method='post'>
                @csrf
                    <div>
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome da Editora<span class="asterisco">*</span></label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                          value="{{$editoras->nome}}" type="text" id="nome" name="nome" placeholder="Nome"/>
                          <input type="hidden" name="_method" value="PUT">
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" id="criar">Editar
                    </button>
                </form>
        </div>
    </div>
   </div>
</div>
</body>
