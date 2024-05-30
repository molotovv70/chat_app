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
    },
    getters: {
        getValue() {
            return this.chats;
        },
    }
})
