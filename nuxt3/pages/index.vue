<template>
  <v-btn to="/admin">
    Admin
  </v-btn>

  <!-- <input type="text" v-model="appDialog.confirmData.test.value" > -->
  <pre>appDialog index.vue: {{ appDialog }}</pre>
</template>

<script setup>
  import useAppDialog from '@/composables/useAppDialog';
  const appDialog = useAppDialog();
</script>