<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import ProductComponent from '@/Components/ProductComponent.vue'
</script>

<template>
    <Head title="Category" />

    <AuthenticatedLayout>
      <div class="container mx-auto">
        <div class="w-full p-1 pt-2 mb-6">
        <div class="text-[27px] font-extrabold capitalize">{{ $page.props.category_name.name }}</div>
        <div class="text-sm font-bold">
          Achetez des divertissements à domicile, des téléviseurs, des systèmes audio pour la maison, des écouteurs, des appareils photo, des accessoires et plus encore
        </div>
        </div>
        <div class="border border-gray-300 rounded-lg text-sm py-3.5 px-10 mb-4">
          1-{{ $page.props.category_by_id.length }} of over {{ $page.props.category_by_id.length  }} results for {{ $page.props.category_name.name }}
        </div>
        <div class="grid grid-cols-4 gap-1">
          <div v-for="product in $page.props.category_by_id" :key="product">
            <ProductComponent :product="product"/>
          </div>
        </div>
      </div> 
    </AuthenticatedLayout>
</template>
 