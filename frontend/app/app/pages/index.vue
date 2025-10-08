<template>
  <v-container>
    <div class="d-flex align-center ga-4">
      <a href="">refresh</a>
      <v-btn
        text="login"
        @click="app.login()"
      />
      <v-btn
        text="logout"
        @click="app.logout()"
      />
      <v-btn
        text="Test"
        to="/test"
      />
    </div>

    <pre>{{ app }}</pre>
  </v-container>
</template>

<script setup>
const app = useApp();
</script>
