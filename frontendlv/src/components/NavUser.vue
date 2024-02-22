<style>
body {
    background-color: #dfebf6;
}
</style>

<template>
    <nav class="navbar navbar-expand-lg navbar-dark position-absolute top-0 start-0 "
        style="background-color: #29353c ;width: 100vw; height: 11vh;">
        <div class="container-fluid">
            <a>
                <h3 class="container mt-2 fst-italic" style="color:rgb(253, 143, 0)"> <b>USER</b></h3>
            </a>
            <router-link class="navbar-brand fst-italic" to="/Datauserr">Click to ShowData</router-link>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav position-absolute end-0 pe-5">
                    <button class="nav-link active bg-dark rounded" v-on:click="logout" to="/login" style="color: red;"><b>Log Out</b></button>
                </div>
            </div>
            
        </div>
    </nav>
</template>

<script>
export default {
    name: 'NavUser',
    methods: {
        logout() {
            localStorage.removeItem('jwt')
            this.$router.push({ name: 'Login' })
            alert('Log out Success')
        }
    }
}
</script>