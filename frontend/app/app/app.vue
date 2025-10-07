<template>
  <div>
    <v-fade-transition>
      <div
        v-if="!app.ready"
        class="bg-surface"
        style="
          display: flex;
          align-items: center;
          justify-content: center;
          position: fixed;
          top: 0;
          left: 0;
          width: 100vw;
          height: 100vh;
          z-index: 99;
        "
      >
        Loading...
      </div>
    </v-fade-transition>

    <nuxt-page v-if="app.ready" />
  </div>
</template>

<script setup>
const app = useApp();
app.init();
</script>
