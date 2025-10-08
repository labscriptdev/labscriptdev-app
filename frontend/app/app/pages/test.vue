<template>
  <v-container>
    <v-btn
      text="Home"
      to="/"
    />
    <pre>{{ app }}</pre>
  </v-container>
</template>

<script setup>
const app = useApp();
</script>
