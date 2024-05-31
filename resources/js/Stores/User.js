import { defineStore } from 'pinia';
import axios from "axios";

export const useUsersStore = defineStore('users', {
    state: () => ({
        users: []
    }),
    actions: {
        async setValue() {
            try {
                // if (!this.users) {
                    const res = await axios.get('/api/users');
                    this.users = res.data; // Обновляем состояние users данными из ответа
                // }
                // return this.users
            } catch (e) {
                console.error(e);
            }
        },
        addValue(user) {
            this.users.push(user);
        },
        getSingleValue(id) {
            return this.users[id];
        }
    },
    getters: {
        getValue() {
            return this.users;
        },
    }
})
