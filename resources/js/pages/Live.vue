<script setup lang="ts">
import { ref, reactive } from "vue";
import dayjs from "dayjs";
import { TrinityRingsSpinner } from "epic-spinners";
import Number from "@/components/Number.vue";

const ballClass =
  "flex items-center justify-center w-8 h-8 lg:w-9 lg:h-9 rounded-full bg-gradient-to-br shadow-md shadow-[rgba(0,0,0,0.4)]";

const result = ref({
  id: 1,
  first: [null, "5", "6", "7", "3", "8"],
  second: ["9", "3", "4", "7", "5", "0"],
  third: ["7", "4", "7", null, "9", "6"],
  starter: ["3", "9", "4", "5", "7", "8"],
  consolation: ["4", "8", "4", "6", "9", "5"],
  created_at: "2023-03-23T10:45:00.000000Z",
});
</script>

<template>
  <div class="w-full">
    <div class="w-full mb-6 last-mb-0">
      <div
        class="w-full px-4 py-2 font-semibold text-white rounded-t-lg bg-gradient-to-b from-orange-500 via-orange-600 to-orange-300"
      >
        {{ dayjs(result.created_at).format("dddd, MMMM DD YYYY") }}
      </div>

      <div
        class="w-full px-4 py-2 text-sm bg-white border border-red-700 rounded-b-lg lg:text-base"
      >
        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">1st Prize</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
          >
            <div
              class="from-red-500 via-red-700 to-red-300"
              :class="ballClass"
              v-for="(num, i) in result.first"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">2nd Prize</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
          >
            <div
              class="from-green-500 via-green-700 to-green-300"
              :class="ballClass"
              v-for="(num, i) in result.second"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">3rd Prize</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
          >
            <div
              class="from-purple-500 via-purple-700 to-purple-300"
              :class="ballClass"
              v-for="(num, i) in result.third"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">Staret Prize</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
          >
            <div
              class="from-yellow-500 via-yellow-700 to-yellow-300"
              :class="ballClass"
              v-for="(num, i) in result.starter"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">Consolation</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
          >
            <div
              class="from-orange-500 via-orange-700 to-orange-300"
              :class="ballClass"
              v-for="(num, i) in result.consolation"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
