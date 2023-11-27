<template>
    <div>
        <div class="form-group mb-4">
            <Link :href="route('notes.index')" class="inline-block bg-sky-600 px-3 py-2 text-white">Назад</Link>
        </div>
            <div>{{note.id}}</div>
            <div class="pb-4">{{note.title}}</div>
            <div class="form-group mb-4">
                <Link :href="route('notes.edit', note.id)" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</Link>
            </div>
            <hr class="mt-4">
        </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Show",

    props:['note'],

    components: {Link},

    layout: MainLayout
}
</script>

<style scoped>

</style>
