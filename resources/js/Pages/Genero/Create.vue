<script setup>

import { useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';


const form = useForm({
    cod_genero: '',
    des_genero: '',

});


const submit = () => {
    form.post(route('genero.store'), {form});
};


</script>

<template>
    <AppLayout title="Genero">

        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Generos /</span>Crear
            </h1>

            <div class="card">

                <form @submit.prevent="submit">
                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <InputLabel for="cod_genero" value="Codigo" />
                            <TextInput id="cod_genero" v-model="form.cod_genero" type="text"
                                class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.cod_genero" />
                        </div>
                        <div>
                            <InputLabel for="des_genero" value="Descripcion" />
                            <TextInput id="des_genero" v-model="form.des_genero" type="text"
                                class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.des_genero" />
                        </div>

                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton>Registrar</PrimaryButton>
                        <Link :href="route('genero.index')" class="btn-white mx-3 px-4 py-2">
                        Cancelar
                        </Link>
                    </div>

                </form>

            </div>
        </div>
    </AppLayout>
</template>