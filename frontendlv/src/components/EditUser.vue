<style>
body {
  background-color: #dfebf6;
}
</style>

<template>
  <div class="d-flex justify-content-center">
  <div class="card" align="left" style=" width: 530px; height: 350px;">
    <div class="card-header" style="background-color: rgb(176, 172, 172);">
      <h2 class="fst-italic fw-bold mt-2 d-flex justify-content-center" style="height: 40px;">Edit User</h2>
    </div>
    <div class="card-body" style="background-color: rgb(227, 239, 249);">
      <form @submit.prevent="updateData" class="text-start">
        <label class="py-1">Name</label>
        <input type="text" v-model="user.name" name="name" id="name" class="form-control" />

        <label class="py-2">Email</label>
        <input type="email" v-model="user.email" name="email" id="email" class="form-control" /><br>

        <router-link :to="{ name: 'AdminPage' }">
          <input type="submit" value="Back" class="btn btn-primary">
        </router-link>
        <input type="submit" value="Save" class="btn btn-success position-relative" style="" />
      </form>
    </div>
  </div>
</div>
</template>
  
<script>
import axios from 'axios';
import Nav from '@/components/Nav.vue';

export default {
  name: 'EditData',
  components: {
    Nav
  },
  data() {
    return {
      user: {
        name: '',
        email: '',
        errors: []
      }
    };
  },
  created() {
    this.getDataById();
  },
  methods: {
    async getDataById() {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/get/${this.$route.params.id}`);
        this.user = response.data;
      } catch (error) {
        console.error('Error fetching user data:', error);
      }
    },
    async updateData() {
      this.user.errors = [];

      if (!this.user.name.trim()) {
        this.user.errors.push('Name is required');
      }
      if (!this.user.email.trim()) {
        this.user.errors.push('Email is required');
      }

      if (this.user.errors.length === 0) {
        try {
          const formData = new FormData();
          formData.append('name', this.user.name);
          formData.append('email', this.user.email);

          const url = `http://127.0.0.1:8000/api/update/${this.$route.params.id}`;
          const response = await axios.post(url, formData);

          if (response.status === 200) {
            alert(response.data.message);
            this.$router.push({ name: 'DataUser' });
          } else {
            alert('Error updating user');
          }
        } catch (error) {
          console.error('Error updating user:', error);
          alert('Error updating user');
        }
      }
    }
  }
};
</script>