import { defineStore } from 'pinia';
import axios from "axios";

export const useChatsStore = defineStore('chats', {
    state: () => ({
        chats: []
    }),
    actions: {
         async setValue() {
            try {
                const res = await axios.get('/api/chats');
                this.chats = res.data;
            } catch (e) {
                console.error(e);
            }
        },
        addValue(chat) {
            this.chats.push(chat);
        },
        async updateLastMessage(message) {
            const chat = await this.getSingleValue(Number(message.user_id_to))
            chat.last_message = message.content
        },
        async getSingleValue(id) {
            if (this.chats.length === 0) {
                await this.setValue();
            }
            return this.chats.find((chat) => chat.id === id);
        },
    },
    getters: {
        getValue() {
            return this.chats;
        },
    }
})
