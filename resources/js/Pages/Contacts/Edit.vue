<template>
  <!--  Así es en Laravel < 8  -->

  <app-layout title="Contacts">

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
      </h2>
    </template>

    <h1 class="text-2xl font-semibold">Edición de contacto</h1>
  </app-layout>

</template>

<script>

  import AppLayout from '@/Layouts/AppLayout.vue';

  export default {
    /* Así es en Laravel < 8 */
    components: {
      AppLayout,
    } 

  }
</script>

<style>

</style>