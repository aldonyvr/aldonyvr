<style>
body {
  background-color: #dfebf6;
}
</style>

<template>
  <div style="width: 1200px; margin-left: 37%;" >
    <div class="col-sm-4"
      style="border: 1px solid rgb(74, 68, 68); border-radius: 15px; padding: 35px; height: 450px;background-color: #aac7d8;">
      <h2 align="center" class="fw-bold fst-italic"> Login</h2><br>

      <form @submit.prevent="LoginData">

        <div class="form-group" align="left">
          <label>Email</label>
          <input type="email" v-model="student.email" class="form-control" placeholder="example@gmail.com">
        </div><br>

        <div class="form-group" align="left">
          <label>Password</label>
          <input type="password" v-model="student.password" class="form-control" placeholder="....">
        </div><br><br><br>

        <div align="center">
          <p>Don't have an account, please <router-link :to="{name : 'Register'}">Register</router-link></p>
        </div>

        <button type="submit" class="btn btn-primary d-flex me-5">Login</button>
        
      </form>

    </div>
  </div>
</template>
   
<script>
import Vue from 'vue';
import axios from 'axios';

Vue.use(axios)
export default {
  name: 'Login',
  data() {
    return {
      result: {},
      student: {
        email: '',
        password: ''
      }
    }
  },
  created() {
  },
  mounted() {
    console.log("mounted() called...");
  },
  methods: {
    LoginData() {
      axios.post("http://127.0.0.1:8000/api/login", this.student)
      .then(response => {
            const data = response.data; // Ambil data dari respons
            // const role = response.data.role_id; // Ambil data dari respons
            // Cek apakah respons memiliki token
            const role = data.role
            console.log("role id=", data.role)
            if (data.token) {
                // Simpan token di localStorage
                localStorage.setItem('jwt', data.token);
                if(role === 1){
                    // Redirect ke halaman HelloWorld setelah login berhasil
                    this.$router.push({ name: 'AdminPage' });
                    alert("Login Success as Admin");
                }else if(role === 2){
                    // Redirect ke halaman HelloWorld setelah login berhasil
                    this.$router.push({ name: 'UserPage' });
                    alert("Login Success as User");
                }else{
                    alert('user tidak terdaftar')
                }
            } else {
                // Jika respons tidak memiliki token, tampilkan pesan kesalahan
                alert("Login failed");
            }
        })
        .catch(error => {
            // Tangani kesalahan ketika mengirim permintaan
            console.error('Login failed:', error);
            alert('Login failed. Please try again.');
        });
        }
  }
}
</script>