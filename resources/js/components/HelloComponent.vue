<template>
    <div id="app">
      <p>{{ message }}</p>
      <button v-on:click="reverseMessage">Reverse Message</button>
    </div>
</template>
<script>
export default {
      data:function(){
          return {
            message: 'Hello Vue!',
          };
      },
      methods: {
        reverseMessage: function () {
          this.message = this.message.split('').reverse().join('')
        }
      }
}
</script>