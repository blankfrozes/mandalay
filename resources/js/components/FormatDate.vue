<template>
  {{ formatDate }}
</template>

<script>
import dayjs from 'dayjs';
export default {
  name: 'FormatDate',
  props: {
    date: {
      type: String,
      required: true,
    },
  },
  computed: {
    formatDate() {
      return dayjs(this.date).format('dddd, MMMM DD YYYY')
    },
  },
}
</script>