<script setup>

import { useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    des_cargo: '',

});

const submit = () => {
    form.post(route('cargo.store'), { form });
};

</script>

<template>
    <AppLayout title="Cargo">

        <div class="caja">
            <h1 class="text-3xl font-semibold text-gray-700 mb-3 mt-4">
                <span class="text-indigo-500">Cargos /</span>Crear
            </h1>

            <div class="card">

                <form @submit.prevent="submit">
                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            <InputLabel for="des_cargo" value="Descripcion" />
                            <TextInput id="des_cargo" v-model="form.des_cargo" type="text" class="mt-1 block w-full" />
                            <InputError class="mt-2" :message="form.errors.des_cargo" />
                        </div>

                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton>Registrar</PrimaryButton>
                        <Link :href="route('cargo.index')" class="btn-white mx-3 px-4 py-2">
                        Cancelar
                        </Link>
                    </div>

                </form>

            </div>
        </div>
    </AppLayout>
</template>