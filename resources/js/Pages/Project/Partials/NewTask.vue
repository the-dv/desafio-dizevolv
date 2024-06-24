<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref, defineEmits } from 'vue';

const emit = defineEmits(["refresh"]);


const isOpen = ref(false);

const props = defineProps(['project_id', 'user_id']);
const page = usePage();

const handleShow = (() => {
    isOpen.value = !isOpen.value;
});


const taskData = useForm({
    title: '',
    description: '',
    start_date: '',
    end_date: '',
    project_id: props.project_id,
    user_id: page.props.auth.user.id
});



const submitTask = async () => {
    var res = await axios.post(route('tasks.store', taskData
    )).then((response) => { emit("refresh"); taskData.reset(); isOpen.value = !isOpen.value; });
    // fetchedTasks.value = res.data;
};

</script>
<template>

    <div class="w-full absolute  bg-white z-50 p-1  bottom-0 flex gap-3 shadow-lg rounded-md border">
        <form @submit.prevent="submitTask" class="w-full flex gap-2">
            <div v-if="isOpen" class="w-4/5 flex flex-col gap-2 ">

                <input type="text" v-model="taskData.title" placeholder="Titulo da tarefa"
                    class="input input-bordered w-full" />
                <div class=" flex gap-2">
                    <div class="flex flex-col w-full">
                        <label>Data inicio</label>
                        <input type="date" v-model="taskData.start_date" class="input input-bordered">
                    </div>
                    <div class="flex flex-col w-full">
                        <label>Data prazo</label>
                        <input type="date" v-model="taskData.end_date" class="input input-bordered">
                    </div>

                </div>
                <textarea v-model="taskData.description" class="textarea textarea-bordered w-full"
                    placeholder="Descricao da tarefa..."></textarea>
            </div>
            <div class="flex flex-col gap-2">
                <!-- {{ page.props.auth.user.id }} -->
                <button v-if="isOpen" type="submit" class="btn btn-primary btn-xs">Salvar tarefa</button>
                <button v-if="!isOpen" @click="handleShow" class="btn btn-primary btn-xs">Nova tarefa +</button>
                <button v-if="isOpen" @click="handleShow" class="text-sm">X Fechar</button>
            </div>
        </form>
    </div>



</template>