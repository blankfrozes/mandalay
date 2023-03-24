<script setup lang="ts">
import { ref, onMounted, computed } from "vue";
import dayjs from "dayjs";
import { useAsyncState } from "@vueuse/core";
import { getLivedrawResult } from "@/services/livedraw.js";
import Number from "@/components/Number.vue";

const ballClass =
  "flex items-center justify-center w-8 h-8 lg:w-9 lg:h-9 rounded-full bg-gradient-to-br shadow-md shadow-[rgba(0,0,0,0.4)]";

const { state, isReady, execute } = useAsyncState(() => {
  return getLivedrawResult();
}, {});

const result = computed(() => state.value);

onMounted(() => {
  setInterval(async () => {
    execute(0);
  }, 10000);
});
</script>

<template>
  <div class="w-full">
    <div class="w-full mb-6 last-mb-0">
      <div
        class="w-full px-4 py-2 font-semibold text-white rounded-t-lg bg-gradient-to-b from-orange-500 via-orange-600 to-orange-300"
      >
        {{ dayjs(result["date"]).format("dddd, MMMM DD YYYY") }}
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
            v-if="isReady"
          >
            <div
              class="from-red-500 via-red-700 to-red-300"
              :class="ballClass"
              v-for="(num, i) in result['grandPrize']"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-else
          >
            <div
              class="from-red-500 via-red-700 to-red-300"
              :class="ballClass"
              v-for="i in 6"
              :key="i"
            >
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">2nd Prize</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-if="isReady"
          >
            <div
              class="from-green-500 via-green-700 to-green-300"
              :class="ballClass"
              v-for="(num, i) in result['secondPrize']"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-else
          >
            <div
              class="from-green-500 via-green-700 to-green-300"
              :class="ballClass"
              v-for="i in 6"
              :key="i"
            >
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">3rd Prize</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-if="isReady"
          >
            <div
              class="from-purple-500 via-purple-700 to-purple-300"
              :class="ballClass"
              v-for="(num, i) in result['thirdPrize']"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-else
          >
            <div
              class="from-purple-500 via-purple-700 to-purple-300"
              :class="ballClass"
              v-for="i in 6"
              :key="i"
            >
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">Staret Prize</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-if="isReady"
          >
            <div
              class="from-yellow-500 via-yellow-700 to-yellow-300"
              :class="ballClass"
              v-for="(num, i) in result['starter']"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-else
          >
            <div
              class="from-yellow-500 via-yellow-700 to-yellow-300"
              :class="ballClass"
              v-for="i in 6"
              :key="i"
            >
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div
          class="flex items-center justify-start w-full py-6 border-b border-yellow-500 gap-x-2 last:border-b-0"
        >
          <div class="w-32 font-bold">Consolation</div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-if="isReady"
          >
            <div
              class="from-orange-500 via-orange-700 to-orange-300"
              :class="ballClass"
              v-for="(num, i) in result['consolation']"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div
            class="flex items-center justify-center flex-1 font-bold text-white gap-x-2"
            v-else
          >
            <div
              class="from-orange-500 via-orange-700 to-orange-300"
              :class="ballClass"
              v-for="i in 6"
              :key="i"
            >
              <Number :number="null" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
