<script setup lang="ts">
import { TrinityRingsSpinner } from "epic-spinners";

const props = defineProps({
  number: String,
});
</script>

<template>
  <div class="flex items-center justify-center w-full h-full">
    <span v-if="number">
      {{ number }}
    </span>

    <span v-else>
      <trinity-rings-spinner
        :animation-duration="1500"
        :size="25"
        color="#fff"
      />
    </span>
  </div>
</template>
