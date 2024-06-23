<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Tarefas from '@/Pages/Financial/Partials/Tarefas.vue';
import NewProject from '@/Pages/Financial/Partials/NewProject.vue';

const page = usePage();
const projects = page.props.projects;


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
                        <NewProject ref="NovoProjeto"></NewProject>
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
                                <tr v-for="(i, index) in projects" :key="index">
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                <div class="font-bold">Hart Hagerty</div>

                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <div>Dashboard financeiro em power BI</div>
                                        <div class="text-xs opacity-50">Criado em: 17/03/2024</div>
                                    </td>
                                    <td>
                                        <div>Descrição do projeto aqui...</div>
                                    </td>
                                    <td>
                                        <div class="badge badge-warning text-white">Em andamento</div>
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


                        <p v-else class="text-center my-10">Nenhum projeto adicionado</p>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
