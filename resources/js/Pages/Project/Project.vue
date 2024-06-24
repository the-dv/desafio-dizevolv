<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ArrowPathIcon } from '@heroicons/vue/24/outline'
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { TrashIcon } from '@heroicons/vue/24/outline';
import Tarefas from './Partials/Tarefas.vue';
import NewProject from './Partials/NewProject.vue';
import axios from 'axios';


const page = usePage();
const department = page.props.departments[0].department.id;
const departmentName = page.props.departments[0].department.name;
// const projects = page.props.departments[0].department.projects;


const projects = page.props.departments[0].projects;

const formateDate = (date) => {
    return new Date(date).toLocaleDateString('pt-BR');
};


const submitDelete = async (project_id) => {
    await axios.delete(route('project.delete'), {
        data: { project_id: project_id }
    })
        .then((response) => {
            window.location.reload();
        })
        .catch(error => {
            console.error(error);
        });
};


function refreshPage() {
    window.location.reload();
}


</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projetos - {{ departmentName }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <!-- Botão "Criar novo projeto" -->
                    <div class="mb-4 flex justify-center gap-2">

                        <NewProject ref="NovoProjeto" :departments="department" :user_id="page.props.auth.user.id" />

                        <button @click="refreshPage()" class="flex text-blue items-center">
                            <ArrowPathIcon class="w-4" /> Atualizar
                        </button>
                    </div>

                    {{ department_test }}
                    <!-- Tabela de projetos -->
                    <div class="overflow-x-auto">
                        <table v-if="projects" class="table">
                            <!-- Cabeçalho da tabela -->
                            <thead>
                                <tr>
                                    <th class="text-xl">Responsável</th>
                                    <th class="text-xl">Nome do projeto</th>
                                    <th class="text-xl">Descrição</th>
                                    <th class="text-xl">Status</th>
                                    <th class="text-xl">Ações</th>
                                </tr>
                            </thead>
                            <tbody>


                                <!-- Linha 1 - Exemplo -->
                                <tr v-if="true" v-for="(i, index) in projects" :key="index">
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">{{ i.project.user.name }}</div>
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ i.title }}</div>
                                        <div class="text-xs opacity-50">Criado em: {{ formateDate(i.project.created_at)
                                            }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ i.project.description }}</div>
                                        <!-- {{ i }} -->
                                    </td>
                                    <td>

                                        <div v-if="i.is_finished" class="rounded-lg flex justify-center text-white"
                                            style="background-color: green;">
                                            Concluido</div>
                                        <div v-else class="badge badge-warning text-white">Em andamento
                                        </div>

                                        <!-- <div class="radial-progress ml-5 text-green-600"
                                            style="--value:70; --size:45px; --thickness: 4px;" role="progressbar">
                                            {{ ((page.props.due_tasks / page.props.tasks) * 100).toFixed(0) }}
                                        </div> -->
                                        <div class="relative inline-flex items-center justify-center w-12 h-12">
                                            <svg class="absolute w-full h-full transform -rotate-90">
                                                <circle class="text-gray-300" stroke-width="4" stroke="currentColor"
                                                    fill="transparent" r="20" cx="24" cy="24" />
                                                <circle v-if="i.totalTasks" class="text-green-600" stroke-width="4"
                                                    stroke-dasharray="125.6"
                                                    :stroke-dashoffset="`calc(125.6 - (125.6 * ${((i.finishedTasks / i.totalTasks) * 100).toFixed(0)}) / 100)`"
                                                    stroke="currentColor" fill="transparent" r="20" cx="24" cy="24" />
                                            </svg>
                                            <small class="text-green-600 text-sm">
                                                {{ i.totalTasks ? ((i.finishedTasks / i.totalTasks) * 100)
                                                    : 0
                                                }} %</small>
                                        </div>


                                    </td>
                                    <td class="flex gap-2">
                                        <Tarefas :project_id="i.project.id" />
                                        <button @click="submitDelete(i.project.id)" class="p-1 bg-red-100 rounded-md">
                                            <TrashIcon class="w-5 text-red-500" />
                                        </button>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <!-- <p v-else class="text-center my-10">Nenhum projeto adicionado</p> -->

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
