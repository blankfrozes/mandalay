<script setup lang="ts">
import { ref, reactive } from "vue";
import dayjs from "dayjs";
import ResultBox from "@/components/ResultBox.vue";

const today = Date.now();
const input = reactive({
  date: "",
});

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

const submitDate = (e) => {
  console.log(input.date);
};
</script>

<template>
  <div class="w-full">
    <div class="w-full mb-6">
      <div class="w-full mb-2">Search by Date :</div>

      <form
        @submit.prevent="submitDate"
        class="flex items-center justify-start w-full gap-x-2"
      >
        <div class="w-60">
          <input
            type="date"
            class="w-full border border-red-500 rounded-lg"
            v-model="input.date"
            :max="dayjs(today).format('YYYY-MM-DD')"
            required
          />
        </div>

        <div class="">
          <button
            type="submit"
            class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-700"
          >
            Submit
          </button>
        </div>
      </form>
    </div>

    <div class="w-full">
      <ResultBox v-for="result in results" :key="result.id" :result="result" />
    </div>
  </div>
</template>
