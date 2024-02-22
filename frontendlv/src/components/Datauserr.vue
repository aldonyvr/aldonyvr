<style>
body {
    background-color: #dfebf6;
}
</style>

<template>
    <div>
        <NavUser />
        <table class="table table-hover table-striped-columns position-absolute top-50 start-50 translate-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role_id</th>
                </tr>
            </thead>
            <tbody v-for="users in user" :key="users.id">
                <tr class="table-secondary-subtle">
                    <td style="background-color: #91a9b8;">{{ users.id }}</td>
                    <td style="background-color: #cbcbcb;">{{ users.name }}</td>
                    <td style="background-color: #91a9b8;">{{ users.email }}</td>
                    <td style="background-color: #cbcbcb;">{{ users.role_id }}</td>
                </tr>
            </tbody>
            
        </table>
    </div>

    <!-- <input type="button" value="Add User" class="mt-4 p-2"> -->
</template>


<script>

import NavUser from '@/components/NavUser.vue'
import axios from 'axios'

export default {
    name: 'User',
    components: {
        NavUser
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
            })
        },
    },
    mounted() {
        console.log('User List Mounted...')
    }
}
</script>