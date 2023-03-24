<script setup lang="ts">
import Header from "./components/Header.vue";
import Ads from "./components/Ads.vue";
</script>

<template>
  <div class="w-full">
    <div class="w-full max-w-3xl mx-auto mb-4 lg:max-w-4xl xl:max-w-5xl">
      <Header />

      <div class="w-full">
        <div class="w-full px-4 py-4 bg-blue-100">
          <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
            <div class="overflow-y-auto min-h-[50vh] max-h-[120vh] hide-scroll">
              <router-view />
            </div>

            <div>
              <Ads />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
