<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
const mahasiswas = ref();
const props = defineProps({
    mahasiswa: Object,
});
mahasiswas.value = props.mahasiswa.data;
const refreshPage = () => {
    location.reload();
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Angkatan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody
                                    v-for="(mahasiswa, index) in mahasiswas"
                                    :key="index"
                                >
                                    <tr>
                                        <th>{{ index + 1 }}</th>
                                        <td>{{ mahasiswa.nama }}</td>
                                        <td>{{ mahasiswa.prodi }}</td>
                                        <td>{{ mahasiswa.angkatan }}</td>
                                        <td>
                                            <Link
                                                :href="$route('show')"
                                                method="get"
                                                :data="{ id: mahasiswa.id }"
                                                as="button"
                                            >
                                                <button
                                                    class="btn btn-sm btn-success mx-1"
                                                >
                                                    Detail
                                                </button>
                                            </Link>
                                            <Link
                                                :href="$route('edit')"
                                                method="get"
                                                :data="{ id: mahasiswa.id }"
                                                as="button"
                                            >
                                                <button
                                                    class="btn btn-sm btn-warning mx-1"
                                                >
                                                    Edit
                                                </button>
                                            </Link>
                                            <Link
                                                :href="$route('destroy')"
                                                method="post"
                                                :data="{ id: mahasiswa.id }"
                                                as="button"
                                            >
                                                <button
                                                    class="btn btn-sm btn-error mx-1"
                                                    @click="refreshPage()"
                                                >
                                                    Hapus
                                                </button>
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Link :href="$route('add')" as="button"
                            ><button class="btn btn-primary my-3">
                                Add
                            </button></Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
