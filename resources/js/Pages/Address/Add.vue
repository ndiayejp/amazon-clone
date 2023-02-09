<template>
  <AuthenticatedLayout>
      <Head title="Ajouter une Adresse"/>
      <div class="mt-8"></div> 
      <div class="bg-white max-w-2xl mx-auto py-5 px-5 rounded-lg border border-gray-300">
        <div class="   text-2xl font-extrabold">
          <div>Ajouter une nouvelle adresse</div>
          <form @submit.prevent="submit">
            <div class="text-[15px] -mb-1 font-extrabold">Pays</div>
            <select
                    v-model="form.country"
                    class="
                        w-full
                        border-gray-300
                        rounded-lg
                        shadow-md
                        py-1
                        bg-gray-200
                        hover:bg-gray-300
                        cursor-pointer
                        focus:border-orange-400
                        focus:ring-orange-400
                    "
                    name="country"
                  >
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Germany">Germany</option>
                    <option selected value="France">France</option>
                  </select>
                  <div class="mt-4">
                    <InputLabel class="mb-2" value="Prénom" />
                    <TextInput
                          v-model="form.first_name"
                          type="text"
                          class="mt-1 block w-full"
                          required
                      />
                  </div>
                  <div class="mt-3">
                      <InputLabel class="mb-2" value="Nom" /> 
                      <TextInput
                          v-model="form.last_name"
                          type="text"
                          class="mt-1 block w-full"
                          required
                      />
                  </div>
                  <div class="mt-3">
                      <InputLabel class="mb-2" value="Adresse" /> 
                      <TextInput
                          type="text"
                          v-model="form.addr1"
                          class="mt-1 block w-full"
                          required
                          placeholder="Adresse ligne 1"
                      />

                      <TextInput
                          type="text"
                          v-model="form.addr2"
                          class="mt-1 block w-full"
                          required
                          placeholder="Adresse ligne 2"
                      />
                  </div>
                  <div class="mt-3">
                      <div class="flex gap-2">
                          <div class="w-full">
                              <InputLabel class="mb-2" value="Ville" />

                              <TextInput
                                  type="text"
                                  v-model="form.city"
                                  class="mt-1 block w-full"
                                  required
                                  placeholder="Ville"
                              />
                          </div>

                          <div class="w-full">
                              <InputLabel class="mb-2" value="Code postal" />

                              <TextInput
                                  type="text"
                                  v-model="form.postcode"
                                  class="mt-1 block w-full"
                                  required
                                  placeholder="code postal"
                              />
                          </div>
                      </div>
                  </div>
                  <div class="mt-6">
                      <button class="bg-yellow-400 px-3 font-bold text-[14px] rounded-lg shadow-sm cursor-pointer">
                          Ajouter une adresse
                      </button>
                  </div> 
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link,useForm,usePage } from '@inertiajs/vue3';
import { toRefs } from 'vue'
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PlusIcon from 'vue-material-design-icons/Plus.vue'
import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue'
 
const form = useForm({
  country:'France',
  first_name:usePage().props.auth.user.first_name,
  last_name:usePage().props.auth.user.last_name,
  addr1: '',
  addr2: '',
  city: '',
  postcode: '',
})
const submit = ()=>{
  form.post(route('address_options.store'),{
    onFinish: ()=>route('address.index')
  })
}
</script>