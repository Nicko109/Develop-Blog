<template>
    <div class="w-96 mx-auto">
        <div class="form-group mb-4">
            <Link :href="route('videos.index')" class="inline-block bg-sky-600 px-3 py-2 text-white">Назад</Link>
        </div>
        <div class="pb-4">{{video.id}}</div>
        <div class="pb-4">{{video.title}}</div>
        <div class="pb-4">{{video.content}}</div>
        <div class="pb-4">
            <video width="320" height="240" controls>
                <source :src="video.file" type="video/mp4">
                Ваш браузер не поддерживает тег video.
            </video>
        </div>
            <div class="form-group mb-4">
                <Link :href="route('videos.edit', video.id)" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</Link>
            </div>
        <div class="form-group mb-4">
            <Link as="button" method="delete" :href="route('videos.destroy', video.id)" class="inline-block bg-rose-600 px-3 py-2 text-white">Удалить</Link>
        </div>
            <hr class="mt-4">
        </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Show",

    props:['video'],

    components: {Link},

    layout: MainLayout
}
</script>

<style scoped>

</style>
