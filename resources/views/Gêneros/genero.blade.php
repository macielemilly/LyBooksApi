@extends('nav')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
   <div class="topo">
   <h1>Gêneros!</h1>
   <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Adicionar</button>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3"style="background-color:#D09953; color:white;">Id</th>
                <th scope="col" class="px-6 py-3"style="background-color:#D09953; color:white;">Nome</th>
                <th scope="col" class="px-6 py-3" style="background-color:#D09953; color:white;" id='ação'>Ações</th>

                
            </tr>
        </thead>
        <tbody>
        @foreach($generos as $genero)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                {{$genero->id}}
                </td>
                <td class="px-6 py-4">
                {{$genero->nome}}
                </td>
                <td id='botões' class="px-6 py-4">
                <a href="{{ route('generos.edit', ['genero' => $genero->id]) }}"><button class="editar" >Editar</button></a>
                <a href="{{ route('generos.show', ['genero' => $genero->id]) }}"><button class="deletar">Mostrar</button></a>
                </td>

            </tr>
            
            @endforeach
        </tbody>
    </table>
    </div>
</div>