<script setup>

import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';


const props = defineProps({
    generos: Object,
});


</script>

<template>
    <AppLayout title="Genero">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Genero
            </h2>
        </template>


        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Generos /</span>Listado
            </h1>

            <div class="card">

                <!-- BOTON CREAR -->
                <div class="flex items-center justify-end mt-2">
                    <Link :href="route('genero.create')"
                        class="btn-nuevo">
                    Nuevo
                    </Link>
                </div>

                <!-- TABLA DE CONTENIDO -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Codigo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="g in generos.data" :key="g.id"
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ g.id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ g.cod_genero }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ g.des_genero }}
                                </td>
                                <td class="px-6 py-4">

                                    <Link :href="route('genero.edit', g)"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                    </Link>
                                    <Link  method="DELETE" as="button" :href="route('genero.destroy', g)"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Eliminar
                                    </Link>

                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <Pagination :pagination="generos"></Pagination>

                </div>

            </div>
        </div>
    </AppLayout>
</template>