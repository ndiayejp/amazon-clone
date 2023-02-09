<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
import { toRefs ,computed} from 'vue';
import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue'
import {useCartStore} from '../store/cart.js'
import { storeToRefs } from 'pinia';


const cartStore = useCartStore()
const {cart} = storeToRefs(cartStore)

const props = defineProps({
  product:Object
})
const {product} = toRefs(props)

const addToCart = (product)=>{
  cart.value.push(product)
}
const isAlreadyInCart = computed(() => {
  let res = cart.value.find(c=>c.id===product.value.id)
  if(res) return true
  return false
})
</script>

<template>
    <Head :title="`Produit ${product.title}`" />

    <AuthenticatedLayout>
        <div class="mt-16"></div>
        <div class="max-w-7xl mx-auto flex gap-4 justify-between">
          <div class="w-2/5">
            <img :src="product.image"/>
          </div>
          <div class="w-2/5">
            <div class="text-xl font-extrabold border-b border-b-gray-400 mb-2 pb-2">  
              {{ product.title }} 
            </div>
            <div>
                <div class="text-lg font-extrabold m-1"> About this item </div>
                <div>   {{ product.description  }}  </div>
            </div>
          </div>
          <div class="w-1/5">
            <div class="border border-gray-400 rounded-lg">
              <div class="my-2  mb-2">
                <div class="flex items-center justify-center border-b px-3 border-gray-400 pb-1">
                  <Link v-if="$page.props.auth.user" :href="route('address.index')" class="flex items-center text-sm mr-2">
                  <MapMarkerOutlineIcon :size="17" class="mr-3"/> Livraison à {{ $page.props.auth.user.first_name }} - {{ $page.props.auth.address.postcode }}</Link>
                  <Link v-else :href="route('login')"  class="flex items-center text-sm font-extrabold text-teal-700 hover:text-red-600 cursor-pointer">
                  Connexion
                  </Link>
                </div>
                <div class="flex items-center justify-between pt-2 px-3">
                  <div class="text-red-600 text-sm font-bold">  
                    ${{ product.price   }}
                  </div>
                  <button @click="addToCart(product)" class="bg-yellow-400 px-2 py-1 font-bold text-sm rounded-lg border shadow-sm cursor-pointer">
                     <span v-if="isAlreadyInCart">Produit ajouté</span>  
                    <span v-else >Ajouter au panier</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
       
    </AuthenticatedLayout>
</template>
 