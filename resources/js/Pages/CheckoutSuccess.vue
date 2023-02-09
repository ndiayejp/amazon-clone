<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { onMounted } from 'vue'
import CheckIcon from 'vue-material-design-icons/Check.vue'
import { useCartStore } from '@/store/cart'
import { storeToRefs } from 'pinia';
const cartStore = useCartStore()
const { cart } = storeToRefs(cartStore)
onMounted(() => {
    cart.value = []
})
</script>

<template>
    <Head title="paiement validé" />

    <AuthenticatedLayout>
        <div class="mt-10 mb-6 max-w-xl mx-auto text-3xl font-extrabold">Paiement réussie</div>

        <div class="max-w-xl mx-auto">
            <div class="flex flex-col p-5 rounded-lg shadow bg-white">
                <div class="flex flex-col items-center text-center">
                    <div class="inline-block p-4 bg-green-100 rounded-full">
                        <CheckIcon :size="100" fillColor="#7CFC00" />
                    </div>
                    <h2 class="mt-2 font-semibold text-2xl text-gray-800">
                        Réussie
                    </h2>
                    <p class="mt-2 text-lg font-bold text-gray-600 leading-relaxed">
                        Votre commande est en chemin!!!
                    </p>
                </div>


            <Link :href="route('dashboard')" class="flex items-center mt-3">
                <button
                    class="
                        flex-1
                        px-4
                        py-2
                        ml-2
                        bg-yellow-500
                        hover:bg-yellow-500
                        text-gray-900
                        font-bold
                        rounded-md
                    "
                >
                    Accueil
                </button>
            </Link>
        </div>
        </div>
    </AuthenticatedLayout>
</template>