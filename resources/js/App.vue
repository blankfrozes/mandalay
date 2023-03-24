<script setup lang="ts">
import Header from "./components/Header.vue";
</script>

<template>
  <div class="w-full">
    <div class="w-full max-w-3xl mx-auto lg:max-w-4xl xl:max-w-5xl">
      <Header />
      <router-view />
    </div>
  </div>
</template>
