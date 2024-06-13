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
                    const res = await axios.get('/api/users');
                    this.users = res.data;
                // }
                // return this.users
            } catch (e) {
                console.error(e);
            }
        },
        addValue(user) {
            this.users.push(user);
        },
        async updateLastMessage(message) {
            const user = await this.getSingleValue(Number(message.user_id_to))
            user.last_message = message.content
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
