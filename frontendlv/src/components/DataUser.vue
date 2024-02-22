<style>
body {
  background-color: #dfebf6;
}
</style>

<template>
    <div class="container">
        <Nav />
        <table class="table table-hover table-striped-columns position-absolute top-50 start-50 translate-middle"
            border="3">
            <thead class="table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role_id</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody v-for="users in user" :key="users.id">
                <tr style="background-color: #;">
                    <td style="background-color: #91a9b8;">{{ users.id }}</td>
                    <td style="background-color: #cbcbcb;">{{ users.name }}</td>
                    <td style="background-color: #91a9b8;">{{ users.email }}</td>
                    <td style="background-color: #cbcbcb;">{{ users.role_id }}</td>
                    <td style="background-color: #91a9b8;"> <router-link :to="{ name: 'EditUser', params: { id: users.id } }"
                            class="btn btn-primary btn-sm">Update</router-link>
                        <button type="button" class="btn btn-danger btn-sm"
                            @click.prevent="deleteUser(users.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- <input type="button" value="Add User" class="mt-4 p-2"> -->
    </div>
</template>

<script>
import Nav from '@/components/Nav.vue'
import axios from 'axios'

export default {
    name: 'Admin',
    components: {
        Nav
    },
    data() {
        return {
            user: Array
        }
    },
    created() {
        this.getUser()
    },
    methods: {
        async getUser() {
            let url = 'http://127.0.0.1:8000/api/show'
            await axios.get(url).then(response => {
                this.user = response.data.user
                console.log(this.user)
            }).catch(error => {
                console.log(error)
            })
        },
        async deleteUser(id) {
            let url = `http://127.0.0.1:8000/api/delete/${id}`
            await axios.delete(url).then(response => {
                if (response.data.code == 200) {
                    alert(response.data.message)
                    this.getUser()
                }
            }).catch(error => {
                console.log(error)
            })
        }
    },
    mounted() {
        console.log('User List Mounted...')
    }
}
</script>