<style>
body {
    background-color: #dfebf6;
}
</style>

<template>
    <div class="container">
        <Nav />
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1>Selamat Datang di Halaman Admin</h1>
        </div>
    </div>
</template>
  
<script>
import Nav from '@/components/Nav.vue'
export default {
    name: 'AdminPage',
    components: {
        Nav
    },
    data() {
        return {

        }
    }
}
</script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->