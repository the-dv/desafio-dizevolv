<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Tarefas from '@/Pages/Financial/Partials/Tarefas.vue';
import NewProject from './Partials/NewProject.vue';

const page = usePage();
const department = page.props.department.id;
const projects = page.props.department.project;

const formateDate = (date) => {
    return new Date(date).toLocaleDateString('pt-BR');
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projetos - Financeiro</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                    <!-- Botão "Criar novo projeto" -->
                    <div class="mb-4">

                        <NewProject ref="NovoProjeto" :departments="department" :user_id="page.props.auth.user.id" />
                    </div>

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
                                    <th class="text-xl">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>


                                <!-- Linha 1 - Exemplo -->
                                <tr v-if="true" v-for="(i, index) in projects" :key="index">
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">{{ i.user_id }}</div>
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ i.title }}</div>
                                        <div class="text-xs opacity-50">Criado em: {{ formateDate(i.created_at) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ i.description }}</div>
                                    </td>
                                    <td>

                                        <div v-if="i.is_finished" class="rounded-lg flex justify-center text-white"
                                            style="background-color: green;">
                                            Concluido</div>
                                        <div v-else class="badge badge-warning text-white">Em andamento
                                        </div>

                                        <div class="radial-progress ml-5 text-green-600"
                                            style="--value:70; --size:70px; --thickness: 4px;" role="progressbar">
                                            70%
                                        </div>

                                    </td>
                                    <td>
                                        <Tarefas />
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
