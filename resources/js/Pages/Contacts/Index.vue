<template>
  <!--  Así es en Laravel  8  -->
  <!-- <AppLayout title="Contacts">  Así no me funciona bien el buscador investigar para esto-->
  <app-layout title="Contacts">

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
      </h2>
    </template>

    <div class="container py-8">
      
      <!-- Requires Tailwind CSS v2.0+ -->
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              
              <div class="px-6 py-4 flex items-center">
                <Input v-model="search" type="text" class="flex-1" placeholder="Ingrese texto para filtrar"></Input>
                <!-- {{ search }} -->
                <Link :href="route('contacts.create')" class="ml-4 flex-shrink-0 btn btn-blue">Nuevo</Link>
              </div>

              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Organization</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">City</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-for="contact in contacts.data" :key="contact.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <!-- <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixl" alt="">
                        </div> -->
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">{{contact.first_name}} {{contact.last_name}}</div>
                          <div class="text-sm text-gray-500">{{contact.email}}</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{contact.organization.name}}</div>
                      <!-- <div class="text-sm text-gray-500">Optimizacion</div> -->
                    </td>
                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{contact.city}}</span>
                    </td> -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{contact.city}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{contact.phone}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"> 
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">
                        <i class="fas fa-chevron-right"></i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>

              <pagination :pagination="contacts"></pagination>

            </div>
          </div>  
        </div>
      </div>
        
      <!-- <h1 class="text-2xl font-semibold">Listado de contactos</h1>
      <pre>{{ contacts }}</pre> -->
    </div>

  </app-layout>>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import Pagination from '@/Components/Pagination.vue'
  import Input from '@/Jetstream/Input.vue'
  import pickBy from 'lodash/pickBy'
  import {Link} from '@inertiajs/inertia-vue3'

  export default {
    components: {
      AppLayout,
      Pagination,
      Input,
      Link,
    },

    data() {
      return {
        search: this.filters.search,
      }
    },

    watch: {
      search($value) {
        this.$inertia.get('/contacts', pickBy({ search: $value }), { preserveState: true })
      }
    },

    props: {
      filters:Object, 
      contacts: Object, /* {
      type: Array,
      required: true
    } */

    },

  }

</script>

<style>

</style>