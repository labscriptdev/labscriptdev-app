<template>

  <!-- Loading -->
  <template v-if="!app.ready">
    <div class="d-flex align-center justify-center" style="height:100vh;">
      <div>
        <div class="text-disabled">Loading</div>
        <v-progress-linear indeterminate />
      </div>
    </div>
  </template>

  <nuxt-page v-if="app.ready" />

  <v-btn @click="appDialog.alert({ title: 'Aaa', onSuccess })">Dialog</v-btn>
  <v-btn @click="appDialog.confirm({ title: 'Aaa', onSuccess })">confirm</v-btn>

  <pre>appDialog: {{ appDialog }}</pre>

  <v-dialog v-model="appDialog.show" width="400">
    <v-card title="Confirmation">
      <v-card-text>
        aaa
      </v-card-text>
      <v-card-actions class="bg-white">
        <pre>{{ useAppDialog.actions }}</pre>
        <template v-for="act in useAppDialog.actions">
          <!-- <v-btn v-bind="act.bind">{{ act.text }}</v-btn> -->
          <pre>{{ act }}</pre>
        </template>
        <!-- <v-btn
          @click="appDialog.actions.error($event)"
        >No</v-btn>
        <v-spacer />
        <v-btn
          class="bg-primary"
          @click="appDialog.actions.success($event)"
        >Yes</v-btn> -->
      </v-card-actions>
    </v-card>
  </v-dialog>

</template>

<script setup>
  import { ref } from 'vue';
  
  import useApp from '@/composables/useApp';
  const app = useApp();

  import useAppDialog from '@/composables/useAppDialog';
  const appDialog = useAppDialog();

  const onSuccess = () => {
    alert('Aaa');
  };
</script>