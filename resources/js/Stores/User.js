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
                //     const res = await axios.get('/api/users');
                    const res = await axios.get('/users');
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
        async getSingleValue(id) {
            if (this.users.length === 0) {
                await this.setValue();
            }
            return this.users.find((user) => user.id === id);
        }
    },
    getters: {
        getValue() {
            return this.users;
        },
    }
})
