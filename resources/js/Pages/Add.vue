<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const nama = ref("");
const nim = ref("");
const prodi = ref("");
const semester = ref("");
const kelas = ref("");
const angkatan = ref("");

const handleSubmit = () => {
    const data = {
        nama: nama.value,
        nim: nim.value,
        prodi: prodi.value,
        semester: semester.value,
        kelas: kelas.value,
        angkatan: angkatan.value,
    };
    Inertia.post("/mahasiswa", data);
};
</script>

<template>
    <Head title="Add" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col p-6 text-gray-900">
                        <input
                            type="text"
                            placeholder="Nama"
                            class="input w-full my-3"
                            v-model="nama"
                            required
                        />
                        <input
                            type="text"
                            placeholder="NIM"
                            class="input w-full my-3"
                            v-model="nim"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Prodi"
                            class="input w-full my-3"
                            v-model="prodi"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Semester"
                            class="input w-full my-3"
                            v-model="semester"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Kelas"
                            class="input w-full my-3"
                            v-model="kelas"
                            required
                        />
                        <input
                            type="text"
                            placeholder="Tahun Angkatan"
                            class="input w-full my-3"
                            v-model="angkatan"
                            required
                        />
                        <button
                            class="btn btn-primary"
                            type="submit"
                            @click.prevent="handleSubmit()"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
