<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col  items-center pt-6  ">
        <div>
            <Link href="/">
                <img class="h-12 fill-current text-gray-500" src="/images/logo/AMAZON_LOGO_DARK.png"/>
            </Link>
        </div>

        <div
            class="w-full  max-w-[450px] mt-6 px-6 py-4 bg-white border boder-gray-300 overflow-hidden  rounded-lg"
        >
            <slot />
        </div>
        <div v-if="$page.url=='/login'" class="w-[450px]">
            <div class="py-4 text-center text-sm text-gray-400">Nouveau sur amazon ? </div>
            <div class="w-full text-center rounded-lg border border-gray-300 bg-gray-200 p-2 hover:bg-gray-300">
                <Link :href=" route('register') ">
                Créer votre compte amazon</Link>
            </div>
        </div>
    </div>
</template>
