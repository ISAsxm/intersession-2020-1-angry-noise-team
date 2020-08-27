<template>
    <button v-on:click="onSubmit">{{text}}</button>
</template>
<script>
export default {
    props: {
        text: {type: String},
        handleSubmit: {type: Function}
    },
    methods: {
      onSubmit() {
          this.handleSubmit();
      }
    }
}
</script>
