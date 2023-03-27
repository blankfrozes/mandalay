<script setup lang="ts">
import { ref, reactive, computed } from "vue";
import { useAsyncState } from "@vueuse/core";
import ResultBox from "@/components/ResultBox.vue";
import { getAllResults } from "@/services/result.js";
import { FulfillingBouncingCircleSpinner } from "epic-spinners";

const { state, isReady, isLoading } = useAsyncState(() => {
  return getAllResults();
}, {});

const resultLists = computed(() => state.value["data"]);
</script>

<template>
  <div v-if="isReady">
    <ResultBox
        v-for="result in resultLists"
        :key="result.id"
        :result="result"
    />
  </div>

  <div class="flex items-center justify-center py-4" v-else-if="isLoading">
    <fulfilling-bouncing-circle-spinner
        :animation-duration="4000"
        :size="40"
        color="#ea580c"
    />
  </div>
</template>
