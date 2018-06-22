<template>
  <div class="login">
    <p>
      {{ msg }}
    </p>
    <button @click="bite">{{ msg2 }}</button>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data () {
    return {
      msg: 'Login',
      msg2: 'allo'
    }
  },
  methods: {
    bite: function () {
      this.msg2 = 'test'
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  h1,
  h2 {
    font-weight: normal;
  }

  ul {
    list-style-type: none;
    padding: 0;
  }

  li {
    display: inline-block;
    margin: 0 10px;
  }

  a {
    color: #42b983;
  }

</style>
