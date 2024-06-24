<script setup>
import { ref, onMounted } from 'vue';
import NewTask from './NewTask.vue';
const modalID = ref('');
const showModalLogin = ref(false);

const showModal = () => {
    const modal = document.getElementById(modalID.value);
    if (modal) modal.showModal();
};

onMounted(() => {
    modalID.value = 'modal_' + Math.floor(Math.random() * 10000000);
});

</script>

<template>
    <button @click="showModal" class="btn btn-primary btn-xs">Tarefas</button>

    <dialog :id="modalID" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg">Tarefas: nome do projeto</h3>
            <div class="w-full mt-4 border flex flex-row h-auto">

                <!-- Lado esquerdo: Tarefas -->
                <div class="w-3/5 border p-2 relative">
                    <h2 class="text-black text-xl">Lista de Tarefas</h2>
                    <div class="overflow-y-auto" style="max-height: 600px; min-height: 600px;">
                        <table class="table table-xs table-pin-rows table-pin-cols">
                            <thead class="text-grey">
                                <tr>

                                    <td>Título</td>
                                    <td>Autor</td>
                                    <td>Data de Início</td>
                                    <td>Data de Prazo</td>
                                    <td>Andamento</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>Task 1</td>
                                    <td>John Doe</td>
                                    <td>01/01/2023</td>
                                    <td>01/31/2023</td>
                                    <td>Em Progresso</td>
                                </tr>
                                <tr>

                                    <td>Task 2</td>
                                    <td>Jane Doe</td>
                                    <td>02/01/2023</td>
                                    <td>02/28/2023</td>
                                    <td>Concluída</td>
                                </tr>
                                <tr>

                                    <td>Task 2</td>
                                    <td>Jane Doe</td>
                                    <td>02/01/2023</td>
                                    <td>02/28/2023</td>
                                    <td>Concluída</td>
                                </tr>
                                <tr>

                                    <td>Task 2</td>
                                    <td>Jane Doe</td>
                                    <td>02/01/2023</td>
                                    <td>02/28/2023</td>
                                    <td>Concluída</td>
                                </tr>


                                <!-- Adicione mais linhas aqui conforme necessário -->
                            </tbody>
                            <tfoot class="text-grey">
                                <tr>

                                    <td>Título</td>
                                    <td>Autor</td>
                                    <td>Data de Início</td>
                                    <td>Data de Prazo</td>
                                    <td>Andamento</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Botão "Adicionar Tarefa" -->
                    <div class="flex justify-start mt-4 w-full relative">
                        <NewTask />
                    </div>
                </div>


                <!-- right side -->
                <div class="w-2/5     p-2">
                    <h2 class="text-black text-xl">Comentários:</h2>
                    <div class="w-full  mt-4 display flex flex-col  ">
                        <!-- content comentarios -->
                        <div class="w-full h-[50vh] overflow-x-auto flex flex-col gap-4">
                            <!-- Comentário -->
                            <div v-for="i in 6" class="w-full p-1 bg-blue-100 rounded-md">
                                <div class="flex items-start gap-2">
                                    <p class="font-semibold">Davi Silva:</p>
                                    <small class="text-xs text-gray-500 ml-auto">10:30 AM</small>
                                    <!-- Exemplo de horário -->
                                </div>
                                <small class="mr-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio
                                    cumque enim assumenda
                                    accusantium ipsa praesentium, harum voluptates blanditiis eos saepe qui doloremque
                                    iure culpa? Ratione veniam officiis itaque quaerat reiciendis.</small>
                            </div>
                        </div>


                        <div class="w-full flex gap-1 flex-row py-3">
                            <textarea class="textarea textarea-bordered w-4/5"
                                placeholder="Escreva um comentário aqui."></textarea>
                            <button class="1/5 btn btn-sm bg-blue-500 hover:bg-blue-600 text-white">Enviar</button>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </dialog>
</template>