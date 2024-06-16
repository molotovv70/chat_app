import { defineStore } from 'pinia';
import axios from "axios";

export const useMessagesStore = defineStore('messages', {
    state: () => ({
        messages: {},
        page: 1
    }),
    actions: {
        async setValue(userId) {
            try {
                // if (!this.users) {
                //     const res = await axios.get('/api/users');
                const res = await axios.get(`/api/users/${userId}/messages`);
                // this.setReversedMessages(res.data);
                // this.page++
                // }
                // return this.users
            } catch (e) {
                console.error(e);
            }
        },
        async fetchMessages(userId) {
            try {
                this.page++
                const res = await axios.get(`/api/users/${userId}/messages?page=${this.page}`);
                this.setReversedMessages(res.data);
            } catch (e) {
                console.log(e)
            }
        },
        setReversedMessages(data) {
            this.messages = {
                ...data,
                data: data.data.reverse() // Реверсируем массив сообщений
            };
        }
        // addValue(user) {
        //     this.messages.push(user);
        // },
        // async updateLastMessage(message) {
        //     const user = await this.getSingleValue(Number(message.user_id_to))
        //     user.last_message = message.content
        // },
        // async getSingleValue(id) {
        //     if (this.users.length === 0) {
        //         await this.setValue();
        //     }
        //     return this.users.find((user) => user.id === id);
        // }
    },
    // getters: {
    //     getValue() {
    //         return this.users;
    //     },
    // }
})
