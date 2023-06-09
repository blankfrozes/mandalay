<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { useAsyncState } from '@vueuse/core'
import dayjs from 'dayjs'
import { getLivedrawResult } from '@/services/livedraw.js'
import Number from '@/components/Number.vue'

const ballClass =
  'flex items-center justify-center w-8 h-8 lg:w-9 lg:h-9 rounded-full bg-gradient-to-br shadow-md shadow-[rgba(0,0,0,0.4)]'
const { state, isReady, execute } = useAsyncState(() => {
  return getLivedrawResult()
}, [])
const result = computed(() => state.value)
onMounted(() => {
  setInterval(async () => {
    await execute(0)
  }, 10000)
})
</script>
<template>
  <div class="w-full">
    <div class="last-mb-0 mb-6 w-full">
      <div
        class="w-full rounded-t-lg bg-gradient-to-b from-orange-500 via-orange-600 to-orange-300 px-4 py-2 font-semibold text-white"
      >
        {{ dayjs(result['date']).format('dddd, MMMM DD YYYY') }}
      </div>

      <div class="w-full rounded-b-lg border border-red-700 bg-white px-4 py-2 text-sm lg:text-base">
        <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
          <div class="w-32 break-words font-bold">ပထမဆုံးဆုတောင်</div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-if="isReady">
            <div
              class="from-red-500 via-red-700 to-red-300"
              :class="ballClass"
              v-for="(num, i) in result.grandPrize"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-else>
            <div class="from-red-500 via-red-700 to-red-300" :class="ballClass" v-for="i in 6" :key="i">
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
          <div class="w-32 break-words font-bold">ဒုတိယဆုတောင်း</div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-if="isReady">
            <div
              class="from-green-500 via-green-700 to-green-300"
              :class="ballClass"
              v-for="(num, i) in result.secondPrize"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-else>
            <div class="from-green-500 via-green-700 to-green-300" :class="ballClass" v-for="i in 6" :key="i">
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
          <div class="w-32 break-words font-bold">တတိယဆုတောင်း</div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-if="isReady">
            <div
              class="from-purple-500 via-purple-700 to-purple-300"
              :class="ballClass"
              v-for="(num, i) in result.thirdPrize"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-else>
            <div class="from-purple-500 via-purple-700 to-purple-300" :class="ballClass" v-for="i in 6" :key="i">
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
          <div class="w-32 break-words font-bold">စတာတစ်ခုခုဆုတောင်း</div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-if="isReady">
            <div
              class="from-yellow-500 via-yellow-700 to-yellow-300"
              :class="ballClass"
              v-for="(num, i) in result.starter"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-else>
            <div class="from-yellow-500 via-yellow-700 to-yellow-300" :class="ballClass" v-for="i in 6" :key="i">
              <Number :number="null" />
            </div>
          </div>
        </div>

        <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
          <div class="w-32 break-words font-bold">ကုန်ကျော်သောပြုလုပ်ဆောင်ခြင်း</div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-if="isReady">
            <div
              class="from-orange-500 via-orange-700 to-orange-300"
              :class="ballClass"
              v-for="(num, i) in result.consolation"
              :key="i"
            >
              <Number :number="num" />
            </div>
          </div>

          <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white" v-else>
            <div class="from-orange-500 via-orange-700 to-orange-300" :class="ballClass" v-for="i in 6" :key="i">
              <Number :number="null" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
