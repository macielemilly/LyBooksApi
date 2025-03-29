<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="deletar_main">
    <h1 class="text-4xl font-bold text-gray-900">Editor selecionado - {{$editoras->nome}}</h1>
    <div class="botoes_deletar">
    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Deletar
</button>
    <a href="{{ route('editoras.index')}}">Voltar</a>
    </div>

</div>    

           
            <!-- Seu conteúdo adicional aqui -->
        </div>
    </main>
    <!-- Main content end -->

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 left-0 right-0 bottom-0 z-50 justify-center items-center flex bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Botão de fechar -->
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            
            <div class="p-4 md:p-5 text-center">
                <!-- Ícone do modal -->
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Tem certeza que deseja apagar esse gênero?</h3>
                <h4 class="mb-5  font-normal text-gray-500 dark:text-gray-400">Você apagará tudo relacionado a ele</h4>
                <form action="{{ route('editoras.destroy', ['editor' => $editoras->id]) }}" method="post">
                @csrf
    <input type="hidden" name="_method" value="delete">
                <!-- Botões dentro do modal -->
                <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Apagar
                </button>
              
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
//Modal
document.addEventListener('DOMContentLoaded', () => {
const modal = document.getElementById('popup-modal');
const openModalButton = document.querySelector('[data-modal-target="popup-modal"]');
const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');

// Ação para abrir o modal
openModalButton.addEventListener('click', () => {
    modal.classList.remove('hidden');  // Exibe o modal
});

// Ação para fechar o modal (clicando no botão de fechar ou no botão de cancelamento)
closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        modal.classList.add('hidden');  // Esconde o modal
    });
});

// Fechar o modal se clicar fora dele
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.classList.add('hidden');  // Esconde o modal se clicar fora dele
    }
});
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
</body>
</html>