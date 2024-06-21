<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Financeiro" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projetos - Financeiro</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">


                    <!-- tabela de projetos -->

                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>

                                    <th class="text-xl">Responsável</th>
                                    <th class="text-xl">Nome projeto</th>
                                    <th class="text-xl">Status</th>
                                    <th class="text-xl">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                <tr>

                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="https://img.daisyui.com/tailwind-css-component-profile-2@56w.png"
                                                        alt="Avatar Tailwind CSS Component" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Hart Hagerty</div>
                                                <div class="text-sm opacity-50">United States</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        Dashboard financeiro em power BI
                                        <br />
                                        <span class="badge badge-ghost badge-sm">Criado em: 17/03/2024</span>
                                    </td>
                                    <td>
                                        <div class="badge badge-warning text-white">Em andamento</div>
                                    </td>
                                    <th>
                                        <button class="btn btn-primary btn-xs">Tarefas do projeto</button>
                                    </th>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
