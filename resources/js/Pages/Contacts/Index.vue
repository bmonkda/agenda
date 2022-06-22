<template>
<!--  Laravel 9  -->
  <AppLayout title="Contacts">

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
      </h2>
    </template>

    <h1 class="text-2xl font-semibold">Listado de contactos</h1>

    <pre>{{ contacts }}</pre>

  </AppLayout>
</template>

<script setup>/* Laravel 9 */
  import AppLayout from '@/Layouts/AppLayout.vue';

  defineProps({
    contacts: {
      type: Array,
      required: true
    }
  });
</script>

<style>

</style>