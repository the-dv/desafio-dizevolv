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
    try {
        const response = await axios.get(route('tasks.index', { project_id: props.project_id }));
        fetchedTasks.value = response.data;
        console.log('fetch:', response.data);
    } catch (error) {
        console.error('Error fetching tasks:', error);
    }
}

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('pt-BR');
};

const refreshData = () => {
    fetchTasks();
};

async function updateTask(task_id) {
    try {
        await axios.patch(route('tasks.update', { id: task_id }));
        fetchTasks();
    } catch (error) {
        console.error('Error updating task:', error);
    }
}

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
                                    <td>Status</td>
                                    <td>Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(task, index) in fetchedTasks" :key="index">
                                    <td class="font-bold">
                                        {{ task.title }} <br>
                                        <small class="text-gray-600">{{ task.description }}</small>
                                    </td>
                                    <td>{{ task.user.name }}</td>
                                    <td>{{ formatDate(task.start_date) }}</td>
                                    <td>{{ formatDate(task.end_date) }}</td>
                                    <td v-if="task.is_finished" class="text-green-600">Concluída</td>
                                    <td v-else class="text-orange-500">Em andamento</td>
                                    <td>
                                        <input @change="updateTask(task.id)" :checked="task.is_finished"
                                            :disabled="task.is_finished" type="checkbox"
                                            class="checkbox checkbox-primary" />
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="text-grey">
                                <tr>
                                    <td>Título</td>
                                    <td>Autor</td>
                                    <td>Data de Início</td>
                                    <td>Data de Prazo</td>
                                    <td>Status</td>
                                    <td>Ações</td>
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
