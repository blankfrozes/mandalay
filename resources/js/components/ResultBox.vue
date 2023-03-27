<script setup lang="ts">
import dayjs from 'dayjs'

const ballClass =
  'flex items-center justify-center w-8 h-8 lg:w-9 lg:h-9 rounded-full bg-gradient-to-br shadow-md shadow-[rgba(0,0,0,0.4)]'

const props = defineProps({
  result: {
    type: Object
  }
})

const first = props.result.first.split('')
const second = props.result.second.split('')
const third = props.result.third.split('')
const starter = props.result.starter.split('')
const consolation = props.result.consolation.split('')
</script>

<template>
  <div class="last-mb-0 mb-6 w-full">
    <div
      class="w-full rounded-t-lg bg-gradient-to-b from-orange-500 via-orange-600 to-orange-300 px-4 py-2 font-semibold text-white"
    >
      {{ dayjs(result.created_at).format('dddd, MMMM DD YYYY') }}
    </div>

    <div class="w-full rounded-b-lg border border-red-700 bg-white px-4 py-2 text-sm lg:text-base">
      <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
        <div class="w-32 break-words font-bold">ပထမဆုံးဆုတောင်</div>

        <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white">
          <div class="from-red-500 via-red-700 to-red-300" :class="ballClass" v-for="(num, i) in first" :key="i">
            {{ num }}
          </div>
        </div>
      </div>

      <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
        <div class="w-32 break-words font-bold">ဒုတိယဆုတောင်း</div>

        <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white">
          <div class="from-green-500 via-green-700 to-green-300" :class="ballClass" v-for="(num, i) in second" :key="i">
            {{ num }}
          </div>
        </div>
      </div>

      <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
        <div class="w-32 break-words font-bold">တတိယဆုတောင်း</div>

        <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white">
          <div
            class="from-purple-500 via-purple-700 to-purple-300"
            :class="ballClass"
            v-for="(num, i) in third"
            :key="i"
          >
            {{ num }}
          </div>
        </div>
      </div>

      <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
        <div class="w-32 break-words font-bold">စတာတစ်ခုခုဆုတောင်း</div>

        <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white">
          <div
            class="from-yellow-500 via-yellow-700 to-yellow-300"
            :class="ballClass"
            v-for="(num, i) in starter"
            :key="i"
          >
            {{ num }}
          </div>
        </div>
      </div>

      <div class="flex w-full items-center justify-start gap-x-2 border-b border-yellow-500 py-6 last:border-b-0">
        <div class="w-32 break-words font-bold">ကုန်ကျော်သောပြုလုပ်ဆောင်ခြင်း</div>

        <div class="flex flex-1 items-center justify-center gap-x-2 font-bold text-white">
          <div
            class="from-orange-500 via-orange-700 to-orange-300"
            :class="ballClass"
            v-for="(num, i) in consolation"
            :key="i"
          >
            {{ num }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
