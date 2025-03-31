@extends('nav')

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center">
    <!-- Overlay background (escurecido apenas ao redor do modal) -->
    <div class="absolute inset-0 bg-black opacity-50"></div>

    <!-- Modal content -->
    <div class="relative p-4 w-full max-w-md max-h-full z-10 bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Criar Gênero
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
        <form class="space-y-4" action="{{ route('generos.store')}}" method="post">
        @csrf
                <div>
                    <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Gênero <span style="color:red;">*</span></label>
                    <input name="nome" id="nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nome" value='{{old("nome")}}' required />
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</button>
            </form>
        </div>
    </div>
</div>



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

<script>
        //Modal
        document.addEventListener('DOMContentLoaded', () => {
       const modal = document.getElementById('authentication-modal');
       const openModalButton = document.querySelector('[data-modal-target="authentication-modal"]');
       const closeModalButton = document.querySelector('[data-modal-hide="authentication-modal"]');
       
       // Abrir o modal
       openModalButton.addEventListener('click', () => {
           modal.classList.remove('hidden');  // Exibe o modal
       });
       
       // Fechar o modal
       closeModalButton.addEventListener('click', () => {
           modal.classList.add('hidden');  // Esconde o modal
       });

       // Fechar o modal ao clicar fora dele
    
   });


   //Fechar
    // Selecionando o botão de fechar
  const closeButton = document.getElementById('close-alert');
  const alertBox = document.getElementById('alert');

  // Adicionando um evento de clique para fechar o alerta
  closeButton.addEventListener('click', () => {
    alertBox.style.display = 'none'; // Esconde o alerta
  });
    </script>
