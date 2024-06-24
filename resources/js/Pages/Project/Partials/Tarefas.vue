<script setup>
import { ref, onMounted } from 'vue';
import NewTask from './NewTask.vue';
import axios from 'axios';
import Comments from './Comments.vue';
const modalID = ref('');

const props = defineProps(['project_id']);

const fetchedTasks = ref([]);

const showModal = () => {
    const modal = document.getElementById(modalID.value);
    if (modal) modal.showModal();
};

async function fetchTasks() {
    var res = await axios.get(route('tasks.index', { project_id: props.project_id }))
        .then(response => {
            fetchedTasks.value = response.data;
            console.log(response.data)
        })
}


const formateDate = (date) => {
    return new Date(date).toLocaleDateString('pt-BR');
};

const refreshData = () => {
    fetchTasks();
};


// update task

async function updateTask(task_id) {
    var res = await axios.patch(route('tasks.update', { id: task_id }
    )).then((response) => { fetchTasks(); });
};

onMounted(() => {
    modalID.value = 'modal_' + Math.floor(Math.random() * 10000000);
    fetchTasks();
});


</script>

<template>
    <button @click="showModal" class="btn btn-primary btn-xs">Tarefas do projeto</button>

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
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i, index) in fetchedTasks[0]" :key="index">
                                    <td class="font-bold">{{ i.title }} <br> <small class="text-gray-600">{{
                                        i.description }}</small></td>

                                    <td>John Doe</td>
                                    <td>{{ formateDate(i.start_date) }}</td>
                                    <td>{{ formateDate(i.end_date) }}</td>

                                    <td v-if="i.is_finished == 1" class="text-green-600">Concluida</td>
                                    <td v-else class="text-orange-500">Em andamento</td>

                                    <td>
                                        <input @change="updateTask(i.id)" :checked="i.is_finished"
                                            :disabled="i.is_finished" type="checkbox"
                                            class="checkbox checkbox-primary" />
                                    </td>
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
                        <NewTask :project_id="props.project_id" @refresh="refreshData" />
                    </div>
                </div>


                <!-- Comentarios -->
                <Comments :project_id="props.project_id" />

            </div>
        </div>
    </dialog>
</template>