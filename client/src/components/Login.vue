<template>
  <div class="login">
    <div class="container">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" @click.prevent="submitLogin">Submit</button>
  </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  methods: {
    submitLogin: function () {
      console.log('Do something here')
    }
  }
}

</script>
