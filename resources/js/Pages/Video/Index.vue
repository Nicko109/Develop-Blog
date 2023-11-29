<template>
    <div class="w-96 mx-auto">
    <div class="form-group mb-4">
        <h1 class="mb-6 pb-6 border-b border-gray-400">Видео</h1>
        <Link :href="route('videos.create')" class="inline-block bg-sky-600 px-3 py-2 text-white">Добавить</Link>
    </div>
    <div class="mb-6 pb-6 border-b border-gray-400" v-for="video in videos">
        <h1 class="pb-4 text-xl">{{video.title}}</h1>
        <div class="pb-4">
            <video width="320" height="240" controls>
                <source :src="video.file" type="video/mp4">
                Ваш браузер не поддерживает тег video.
            </video>
        </div>
        <p class="pb-4">{{video.content}}</p>
        <p class="text-right text-sm text-slate-500 mt-2">{{video.date}}</p>
        <div class="form-group mb-4">
            <Link :href="route('videos.show', video.id)" class="inline-block bg-purple-600 px-3 py-2 text-white">Посмотреть</Link>
        </div>
        <div class="form-group mb-4">
            <Link :href="route('videos.edit', video.id)" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</Link>
        </div>
        <div class="form-group mb-4">
            <Link as="button" method="delete" :href="route('videos.destroy', video.id)" class="inline-block bg-rose-600 px-3 py-2 text-white">Удалить</Link>
        </div>
        <hr class="mt-4">
    </div>
</div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    name: "Index",

    props:['videos'],

    components: {Link},

    layout: MainLayout
}
</script>

