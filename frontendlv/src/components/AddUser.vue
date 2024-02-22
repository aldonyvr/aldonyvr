<style>
body {
  background-color: #dfebf6;
}
</style>

<template>
    <div class="d-flex justify-content-center">
    <Nav />
      <div class="card mt-5" align="left" style="width: 500px; height: 480px">
        <div class="card-header" style="background-color: #44576d;">
          <h2 class="fst-italic fw-bold mt-2 d-flex justify-content-center" style="height: 40px; color: aliceblue;">Add User</h2>
        </div>
        <div class="card-body" style="background-color: #aac7d8;">
  
          <form @submit.prevent="saveData">
  
            <label>Username</label>
            <input type="text" v-model="student.name" name="name" id="name" class="form-control"
              placeholder="enter your username " /><br>
    
            <label>Email</label>
            <input type="email" v-model="student.email" name="email" id="email" class="form-control"
              placeholder="example@gmail.com" /><br>
  
            <label>Password</label>
            <input type="password" v-model="student.password" name="password" id="password" class="form-control "
              placeholder="....." /><br><br><br><br>
  
            <router-link :to="{ name: 'DataUser' }">
              <input type="submit" value="Back" class="btn btn-primary">
            </router-link>
  
            <input type="submit" value="Save" class="btn btn-success">
  
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import Vue from "vue";
  import axios from "axios";
  import Nav from "@/components/Nav.vue";
  
  Vue.use(axios);
  export default {
    name: "AddUser",
    components: {
      Nav
    },
    data() {
      return {
        result: {},
        student     : {
          name: "",
          email: "",
          password: "",
        },
      };
    },
    created() {},
    mounted() {
      console.log("mounted() called......");
    },
    methods: {
      saveData() {
        axios
          .post("http://127.0.0.1:8000/api/register", this.student)
          .then(({ data }) => {
            console.log(data);
            try {
              alert("Data successfully uploaded");
              this.$router.push({ name: "DataUser" });
            } catch (error) {
              alert(error);
            }
          });
      },
    },
  };
  </script>