<style>
body {
  background-color: #dfebf6;
}
</style>

<template>
  <div>
    <h1>Welcome to Home</h1> <br>


    <router-link :to="{ name: 'Login' }">
      <input type="submit" value="LOGIN" class="btn btn-primary" style="width: 200px; height: 50px;">
    </router-link>

    <router-link :to="{ name: 'Login' }">
      <input type="submit" value="REGISTER" class="btn btn-success" style="width: 200px; height: 50px;">
    </router-link>
  </div>
</template>
  
<script>
export default {
  name: 'Home',
  data() {
    return {

    }
  }
}
</script>