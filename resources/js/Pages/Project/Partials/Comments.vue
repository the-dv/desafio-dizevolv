<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { onMounted, ref, defineEmits } from 'vue';

const fetchedComments = ref([]);

const props = defineProps(['project_id']);



const form = useForm({
    text: '',
    project_id: props.project_id
});

async function fetchComments() {
    var res = await axios.get(route('comments.index', form))
        .then(response => {
            fetchedComments.value = response.data;
        })
}


const submit = async () => {
    var res = await axios.post(route('comments.store', form
    )).then((response) => { form.reset(); fetchComments(); });
};

onMounted(() => {
    fetchComments();
});


const formateDate = (date) => {
    return new Date(date).toLocaleDateString('pt-BR');
};

</script>

<template>
    <div class="w-2/5   p-2">
        <h2 class="text-black text-xl">Comentários:</h2>
        <div class="w-full  mt-4 display flex flex-col  ">
            <!-- content comentarios -->
            <div class="w-full h-[50vh] overflow-x-auto flex flex-col gap-4">
                <!-- Comentário -->
                <div v-if="true" v-for="(i, index) in fetchedComments.comments" :key="index"
                    class="w-full p-1 bg-blue-100 rounded-md">
                    <div class="flex items-start gap-2">
                        <p class="font-semibold">{{ i.user.name }}:</p>
                        <small class="text-xs text-gray-500 ml-auto">{{ formateDate(i.created_at) }}</small>
                        <!-- Exemplo de horário -->
                    </div>
                    <small class="mr-1">{{ i.text }}</small>
                </div>
            </div>


            <form @submit.prevent="submit" class="w-full flex gap-4 flex-row py-3">
                <textarea v-model="form.text" class="textarea textarea-bordered w-4/5"
                    placeholder="Escreva um comentário aqui."></textarea>
                <button class="1/5 btn btn-sm bg-blue-500 hover:bg-blue-600 text-white">Enviar</button>
            </form>


        </div>

    </div>
</template>