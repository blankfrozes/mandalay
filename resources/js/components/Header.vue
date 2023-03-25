<script setup lang="ts">
import { ref } from "vue";

const showNavMobile = ref(false);
const navClass =
  "md:block py-1 hover:text-yellow-500 text-shadow shadow-black hidden bg-transparent";

const navMobileClass =
  "block py-2 px-4 hover:text-yellow-500 text-shadow-sm shadow-black bg-transparent";

const toogleNavMobile = () => {
  showNavMobile.value = !showNavMobile.value;
};
const closeNavMobile = () => {
  showNavMobile.value = false;
};
</script>

<template>
  <header class="relative w-full bg-white">
    <div class="flex justify-start w-full px-4 py-2 md:py-6">
      <div>
        <a href="/" class="block bg-transparent">
          <img
            src="/images/mandalay_logo.png"
            alt="Mandalay"
            class="w-64 md:w-80"
          />
        </a>
      </div>

      <div class="flex justify-end flex-1 lg:hidden">
        <div class="relative w-8 py-2" @click="toogleNavMobile">
          <img
            :src="showNavMobile ? '/images/menu_alt.svg' : '/images/menu.svg'"
            alt="nav"
            class="w-full cursor-pointer fill-black"
          />
        </div>
      </div>
    </div>

    <nav
      class="flex items-center justify-center w-full py-4 text-sm italic font-semibold text-white bg-center bg-no-repeat bg-cover md:text-base gap-x-6 md:gap-x-10 lg:gap-x-16 md:py-0"
      style="background-image: url('images/bg_nav.jpg')"
    >
      <a href="/" :class="navClass">အိမ်</a>
      <a href="/search" :class="navClass">ရက်စွဲဖြင့် ရှာဖွေရန်</a>
      <a href="/live" :class="navClass">ယနေ့တွင် တင်သွင်းမှု</a>
      <a href="/how-to-play" :class="navClass">ဘောလုံးကို ဘယ်လိုလုပ်ရမလဲ</a>
      <a href="/contact-us" :class="navClass">ဆက်သွယ်ရန်</a>
    </nav>

    <transition-slide>
      <div
        class="w-full absolute top-[100%] left-0 text-white font-semibold bg-center bg-no-repeat bg-cover bg-transparent"
        style="background-image: url('images/bg_nav.jpg')"
        v-if="showNavMobile"
        v-click-outside="closeNavMobile"
      >
        <nav class="w-full flex flex-col justify-start [*$>a]:">
          <a href="/" :class="navMobileClass">အိမ်</a>
          <a href="/search" :class="navMobileClass">ရက်စွဲဖြင့် ရှာဖွေရန်</a>
          <a href="/live" :class="navMobileClass">ယနေ့တွင် တင်သွင်းမှု</a>
          <a href="/how-to-play" :class="navMobileClass"
            >ဘောလုံးကို ဘယ်လိုလုပ်ရမလဲ</a
          >
          <a href="/contact-us" :class="navMobileClass">ဆက်သွယ်ရန်</a>
        </nav>
      </div>
    </transition-slide>
  </header>
</template>
