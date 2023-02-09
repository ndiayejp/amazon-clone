<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/vue3';
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Navigation, Slide } from 'vue3-carousel'
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <carousel :items-to-show="1">
            <slide v-for="slide in 6" :key="slide">
                <img :src="`/images/carousel/slide${slide}.jpg`"/>                
            </slide> 
            <template #addons>
            <navigation />
            <pagination />
            </template>
        </carousel>
        <div class="relative -mt-[300px] container mx-auto">
            <div class="flex my-4 z-10 relative">
                <div class="bg-white mx-2 p-2 text-md w-full text-center">
                    Vous êtes sur amazon.com Vous pouvez également acheter sur Amazon UK des millions de produits avec une livraison locale rapide.
                    <span class="underline text-teal-600 cursor-pointer">Cliquez ici pour accéder à amazon.co.uk</span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 my-4 pt-4 z-10 relative">
                <div class="p-1.5 flex gap-5" v-for="cat in $page.props.categories" :key="cat">
                    <Link :href="route('category.index',{id:cat.id}) " class="bg-white p-5 w-full" >
                        <div class="text-xl text-center capitalize font-extrabold flex mb-2">{{ cat.name }}</div>
                        <div class="flex">
                            <img class="object-fill h-[250px]" :src="`images/categories/${cat.id}.png`">
                         </div>
                         <div class="pt-3 -mb-2 text-teal-800 font-bold hover:underline hover:text-red-400 cursor-pointer flex justify-center">
                            En voir plus
                        </div>
                    </Link> 
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>
.carousel__item {
    font-size: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.carousel__prev,
.carousel__next {
    width: 40px;
    height: 200px;
    color: rgb(196, 196, 196);
    margin-top: -100px;
    border: transparent
}
.carousel__prev:hover,
.carousel__next:hover {
    width: 40px;
    height: 200px;
    color: rgb(212, 212, 212);
    margin-top: -100px;
    border: 3px solid rgb(217, 217, 217);
}
</style>