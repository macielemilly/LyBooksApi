<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alugueis</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>

<body>

    @extends('nav')

    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex justify-center items-center">
        <!-- Overlay background (escurecido apenas ao redor do modal) -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <div class="relative p-4 w-full max-w-md max-h-full z-10 bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Criar Aluguel
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="{{ route('alugueis.store')}}" method="post">
                    @csrf
                    <div>
                        <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome do Livro <span style="color:red;">*</span></label>
                        <input name="nome" id="nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nome do livro" value="{{ old('nome') }}"  />
                    </div>

                    <div>
                        <label for="locatario" class="block mb-2 text-sm font-medium text-gray-900">Locatário <span style="color:red;">*</span></label>
                        <input name="locatario" id="locatario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nome do locatário" value="{{ old('locatario') }}" />
                    </div>

                    <div>
                        <label for="data_aluguel" class="block mb-2 text-sm font-medium text-gray-900">Data de Aluguel <span style="color:red;">*</span></label>
                        <input type="date" name="data_aluguel" id="data_aluguel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('data_aluguel') }}" />
                    </div>

                    <div>
                        <label for="data_devolucao" class="block mb-2 text-sm font-medium text-gray-900">Data de Devolução <span style="color:red;">*</span></label>
                        <input type="date" name="data_devolucao" id="data_devolucao" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ old('data_devolucao') }}" />
                    </div>

                    <button style="background-color:#035353;" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Criar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="p-4 sm:ml-80">
   <div class="tabela  p-4 border-2 border-gray-200 border-dashed rounded-lg mt-25">
            <div class="topo">
                <h1>Alugueis!</h1>
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">Adicionar</button>
            </div>

            @if(session()->has('message'))
            <div id="alert" class="bg-green-100 border border-green-400 text-green-700 my-4 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"> {{ session()->get('message') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg id="close-alert" class="fill-current h-6 w-6 text-green-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
            @endif

            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mb-4" role="alert">
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

           

<div class="mt-4">
    @if($alugueis->isEmpty())
        <div class="text-center text-gray-500 text-lg font-medium rounded p-4">
            Nenhum Aluguel feito ainda.
        </div>
    @else
    <div class="  mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
     @foreach($alugueis as $aluguel)
     <div style="background-color:white;" class="cartao relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-400">
                <div class="">
                    <a href="#">
                    <div style="background-color:#013C3C;" class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <div class="itens_cartoes">
                            <h5 style="color:white" class="mb-1 text-2xl tracking-tight text-gray-900">{{$aluguel->nome}}</h5>
                        </div>
                        </div>
                    </a>
                    <p class="px-3 pt-3 mb-3 font-normal text-gray-700">ID: {{$aluguel->id}}</p>
                    <div class="botao_tab mb-5 mr-5 flex gap-2">
                    <a href="{{ route('alugueis.edit', ['aluguel' => $aluguel->id]) }}"><button class="editar">Editar</button></a>
                    <a href="{{ route('alugueis.show', ['aluguel' => $aluguel->id]) }}"><button style="background-color:#035353;" class="deletar">Mostrar</button></a>
                    </div>
                </div>
            </div>
    @endforeach
</div>
@endif
</div>

    <script>
        // Modal
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('authentication-modal');
            const openModalButton = document.querySelector('[data-modal-target="authentication-modal"]');
            const closeModalButton = document.querySelector('[data-modal-hide="authentication-modal"]');

            // Abrir o modal
            openModalButton.addEventListener('click', () => {
                modal.classList.remove('hidden'); // Exibe o modal
            });

            // Fechar o modal
            closeModalButton.addEventListener('click', () => {
                modal.classList.add('hidden'); // Esconde o modal
            });
        });

        // Fechar alerta
        const closeButton = document.getElementById('close-alert');
        const alertBox = document.getElementById('alert');
        closeButton.addEventListener('click', () => {
            alertBox.style.display = 'none'; // Esconde o alerta
        });
    </script>
</body>

</html>