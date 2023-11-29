<template>
    <div class="w-96 mx-auto">
        <div class="form-group mb-4 flex items-center justify-between mb-6 pb-6 border-b border-gray-400">
            <h1 style="color: blue">Видео</h1>
            <Link :href="route('videos.create')" class="inline-block bg-sky-600 px-3 py-2 text-white">Добавить</Link>
        </div>
    <div class="mb-6 pb-6 border-b border-gray-400" v-for="video in videos">
        <Link :href="route('videos.show', video.id)">
            <h1 class="pb-4 text-xl link-text">{{video.title}}</h1>
        </Link>
        <div class="pb-4">
            <video width="320" height="240" controls>
                <source :src="video.file" type="video/mp4">
                Ваш браузер не поддерживает тег video.
            </video>
        </div>
        <p class="pb-4">{{video.content}}</p>
        <div class="flex justify-between items-center mt-2">
            <div class="flex">

                <svg @click.prevent="toggleLike(video)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     :class="['mr-2 stroke-sky-500 cursor-pointer hover:fill-sky-500 w-6 h-6', video.is_liked ? 'fill-sky-500' : 'fill-white']">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                </svg>
                <p>{{video.likes_count}}</p>
            </div>
            <p class="text-right text-sm text-slate-500">{{video.date}}</p>
        </div>
        <div class="form-group my-4 flex items-center justify-between">
            <Link :href="route('videos.edit', video.id)" class="inline-block bg-green-600 px-3 py-2 text-white">Редактировать</Link>
            <Link as="button" method="delete" :href="route('videos.destroy', video.id)" class="inline-block bg-rose-600 px-3 py-2 text-white">Удалить</Link>
        </div>
    </div>
</div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";
import axios from "axios";

export default {
    name: "Index",

    props:['videos'],

    components: {Link},

    methods: {
      toggleLike(video) {
          axios.post(`/videos/${video.id}/toggle_like`)
          .then(res => {
              video.is_liked = res.data.is_liked;
              video.likes_count = res.data.likes_count;
          })
              .catch(error => {
                  console.error("Ошибка при обновлении лайка:", error);
              });
      }
    },

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

