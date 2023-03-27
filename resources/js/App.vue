<script setup lang="ts">
import Header from './components/Header.vue'
import Ads from './components/Ads.vue'
</script>

<template>
  <div class="w-full">
    <div class="mx-auto mb-4 w-full max-w-3xl lg:max-w-4xl xl:max-w-5xl">
      <Header />

      <div class="w-full">
        <div class="max-h-[35rem] w-full overflow-hidden rounded-b-xl bg-blue-100 px-4 py-4 shadow-lg">
          <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
            <div class="hide-scroll max-h-[35rem] overflow-y-auto">
              <router-view />
            </div>
            <Ads />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
