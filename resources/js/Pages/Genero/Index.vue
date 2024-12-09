<script>

import { Link, router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';


export default {
    components: {
        AppLayout, Pagination, Link
    },
    props: {
        generos: Object,
    },
    data() {
        return {
            confirmDeleteActive: false,
            deleteGeneroRow: ""
        }
    },
    methods: {
        deleteGenero() {
            router.delete(route('genero.destroy', this.deleteGeneroRow))
            this.confirmDeleteActive = false;
        }
    }
}


</script>

<template>

    <AppLayout title="Genero">
    
        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Generos </span>
            </h1>

            <div class="card">

                <!-- BOTON CREAR -->
                <div class="flex items-center justify-start mt-2">
                    <Link :href="route('genero.create')" class="btn-nuevo">
                    Nuevo
                    </Link>
                </div>

                <!-- TABLA DE CONTENIDO -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="table-content">
                        <thead class="table-thead">
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
                            <tr v-for="g in generos.data" :key="g.id" class="table-tbody-tr">
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
                                        class="mr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    <i class="fas fa-edit"></i>
                                    </Link>
                                    <Link :href="route('genero.show', g)"
                                        class="mr-3 font-black text-green-600 dark:text-green-500 hover:underline">
                                    <i class="fa-solid fa-eye"></i>
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