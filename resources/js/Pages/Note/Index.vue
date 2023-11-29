<template>
    <div class="w-96 mx-auto">
        <div class="form-group mb-4 flex items-center justify-between mb-6 pb-6 border-b border-gray-400">
            <h1 style="color: blue">Заметки</h1>
            <Link :href="route('notes.create')" class="inline-block bg-sky-600 px-3 py-2 text-white">Добавить</Link>
        </div>
    <div class="mb-6 pb-6 border-b border-gray-400" v-for="note in notes">
        <Link :href="route('notes.show', note.id)">
            <h1 class="pb-4 text-xl link-text">{{ note.title }}</h1>
        </Link>
        <p class="text-right text-sm text-slate-500">{{note.date}}</p>
        <div class="form-group my-4 flex items-center justify-between">
            <Link :href="route('notes.edit', note.id)" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</Link>
            <Link as="button" method="delete" :href="route('notes.destroy', note.id)" class="inline-block bg-rose-600 px-3 py-2 text-white">Удалить</Link>
        </div>

    </div>
</div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",

    props:['notes'],

    components: {Link},



    layout: MainLayout
}
</script>

<style scoped>
.link-text {
    transition: color 0.3s; /* добавлен переход для плавного изменения цвета */
}

.link-text:hover {
    color: blue; /* цвет при наведении */
}
</style>
