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
                    // this.users.forEach((user) => {
                    //     user.page = 1
                    // })
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
        },

        // messages
        // async fetchMessages(userId) {
        //     try {
        //         const user = await this.getSingleValue(userId);
        //         const res = await axios.get(`/api/users/${userId}/messages?page=${user.page}`);
        //         user.messages = () => this.setReversedMessages(res.data);
        //         user.page++;
        //     } catch (e) {
        //         console.log(e)
        //     }
        // },
        // setReversedMessages(data) {
        //     this.messages = {
        //         ...data,
        //         data: data.data.reverse()
        //     };
        // }
        // async fetchChatMessages()
    },
    getters: {
        getValue() {
            return this.users;
        },
    }
})
