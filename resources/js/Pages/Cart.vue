<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
import { computed, toRefs } from 'vue';
import Delete from 'vue-material-design-icons/Delete.vue';

import {useCartStore} from '../store/cart.js'
import { storeToRefs } from 'pinia';


const cartStore = useCartStore()
const { cart } = storeToRefs(cartStore) 
 

const removeFromCart = (id)=>{
  cartStore.removeProductFromCart(id)
}
const total = computed(()=>{
  let total = 0
  cart.value.forEach(c=>{
   
    total+=c.price
    
  })
  if(total>0){
    return total.toFixed(2)
  }
  return 0
})  

const totalWithoutDot = ()=>{
  let num = String(total.value).split('.').join('')
  return Number(num)
}
 
</script>

<template>
    <Head title="Panier"/>

    <AuthenticatedLayout>
      <div class="flex gap-4 max-w-7xl mx-auto">
        <div class="w-full bg-white p-4 mt-4 rounded-lg border border-gray-300">
          <div class="border-b">
              <div class="text-[27px] font-semibold">Panier: {{ cart.length }} Article(s) </div>
          </div>
          <div v-if="!cart.length" class="text-center font-bold text-2xl py-20">
            Votre panier est vide
          </div>
          <div v-else class="flex border-b" v-for="product in cart" :key="product.id">
            <img class="h-[150px] mt-4 mb-4" :src="product.image" />
            <div class="flex justify-between mb-4 w-full">
              <div class="pl-8 py-10 relative">
                <div class="text-gray-900 pb-2 -mt-4 font-bold text-[18px]">
                  {{ product.title }}
                </div>
                <span class="text-gray-600">{{ product.description.substring(0,60) }}...</span>
                <div class="text-green-600 py-2 text-sm font-bold">En Stock</div>
                <div class="text-red-600 absolute bottom-0 mb-4 flex items-center">
                  <div @click="removeFromCart(product.id)" class="flex items-center text-sm font-bold underline hover:text-red-900 cursor-pointer">
                    Supprimer
                  </div>
                </div>
              </div>
              <div class="py-10 justify-end">
                <div class="font-bold pl-20">${{ product.price }}</div>
              </div>
            </div>
          </div>
          <div class="font-extrabold text-[18px] pt-4 text-right text-gray-800">
             Total : ${{ total }}
          </div>
        </div>
        <div class="bg-white w-[350px] p-4 mt-4 h-48 rounded-lg border border-gray-300">
          <div class="text-sm text-gray-800"> 
            <div class="font-extrabold text-[18px] pt-4 text-center">
               Total: ${{ total }}
            </div>
            <Link
            :href="$page.props.auth.user !== null
                  ? route('checkout.store', {
                      total: totalWithoutDot(),
                      total_decimal: total,
                      items: cart
                  })
                  : route('login')"
            :disabled="Number(total) === 0.00"
            :class="Number(total) === 0.00 ? 'bg-gray-400' : 'bg-yellow-400 hover:bg-yellow-500'"
            as="button"
            :method="$page.props.auth.user !== null ? 'post' : 'get'"
            class="block mt-4 w-full text-center  py-3 font-bold
              text-sm rounded-lg border shadow-sm cursor-pointer
            ">
            Procéder au paiement
            </Link>
          </div>
        </div>  
      </div>
    </AuthenticatedLayout>
</template>
 