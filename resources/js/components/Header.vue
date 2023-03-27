<script setup lang="ts">
import { ref } from 'vue'

const showNavMobile = ref(false)
const navClass = 'md:block py-1 hover:text-yellow-500 text-shadow shadow-black hidden bg-transparent'

const navMobileClass = 'block py-2 px-4 hover:text-yellow-500 text-shadow-sm shadow-black bg-transparent'

const toogleNavMobile = () => {
  showNavMobile.value = !showNavMobile.value
}
const closeNavMobile = () => {
  showNavMobile.value = false
}
</script>

<template>
  <header class="relative w-full bg-white">
    <div class="flex w-full items-center justify-between px-4 py-2 md:space-x-2 md:py-6">
      <div>
        <a href="/" class="block bg-transparent">
          <img src="/images/mandalay_logo.png" alt="Mandalay" class="w-64 md:w-80" />
        </a>
      </div>

      <div class="flex hidden flex-1 items-center sm:block">
        <a href="http://www.partycasino.com/td/93992usd_topgun.htm?wm=3111672">
          <img src="@/images/noblecasino.avif" alt="noblecasino" class="w-full" />
        </a>
      </div>

      <div class="flex flex-1 justify-end lg:hidden">
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
      class="flex w-full items-center justify-center gap-x-6 bg-cover bg-center bg-no-repeat py-4 text-sm font-semibold italic text-white md:gap-x-10 md:py-0 md:text-base lg:gap-x-16"
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
        class="absolute top-[100%] left-0 w-full bg-transparent bg-cover bg-center bg-no-repeat font-semibold text-white"
        style="background-image: url('images/bg_nav.jpg')"
        v-if="showNavMobile"
        v-click-outside="closeNavMobile"
      >
        <nav class="[*$>a]: flex w-full flex-col justify-start">
          <a href="/" :class="navMobileClass">အိမ်</a>
          <a href="/search" :class="navMobileClass">ရက်စွဲဖြင့် ရှာဖွေရန်</a>
          <a href="/live" :class="navMobileClass">ယနေ့တွင် တင်သွင်းမှု</a>
          <a href="/how-to-play" :class="navMobileClass">ဘောလုံးကို ဘယ်လိုလုပ်ရမလဲ</a>
          <a href="/contact-us" :class="navMobileClass">ဆက်သွယ်ရန်</a>
        </nav>
      </div>
    </transition-slide>
  </header>
</template>
