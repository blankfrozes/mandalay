<script setup lang="ts">
import { ref } from "vue";
import ResultBox from "@/components/ResultBox.vue";

const results = ref([
  {
    id: 1,
    first: "456738",
    second: "934750",
    third: "747596",
    starter: "394578",
    consolation: "484695",
    created_at: "2023-03-23T10:45:00.000000Z",
  },
  {
    id: 2,
    first: "456732",
    second: "934755",
    third: "747590",
    starter: "394571",
    consolation: "484696",
    created_at: "2023-03-22T10:45:00.000000Z",
  },
  {
    id: 3,
    first: "456718",
    second: "937750",
    third: "747396",
    starter: "394278",
    consolation: "184695",
    created_at: "2023-03-21T10:45:00.000000Z",
  },
]);
</script>

<template>
  <div class="w-full">
    <ResultBox v-for="result in results" :key="result.id" :result="result" />
  </div>
</template>
