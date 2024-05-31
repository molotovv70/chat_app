<script setup>
import {Link, usePage} from "@inertiajs/vue3";

const page = usePage();
const user = page.props.auth.user

const props = defineProps({
    size: {
        type: Number,
        default: 256
    },
})

</script>

<template>
    <div class="w-full">
        <div class="flex">
            <div class="mb-4 mx-auto self-center">
                <div v-if="user.avatar_path" class="user__image-wrapper self-center">
                    <a class="" href="#" @click.prevent="$refs.avatar_load?.click()">
                        <img
                            class="user__image"
                            :src="`/storage/${user.avatar_path}`"
                            :alt="user.name"
                        />
                    </a>
                </div>
                <div v-else class="user__image-wrapper">
                    <a class="" href="#" @click.prevent="$refs.avatar_load.click()">
                        <VaIcon class="user__image" name="account_circle" :size="props.size"  />
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

.va-icon {
    z-index: 50;
    position: absolute;
}

.user__image {
    //width: 128px;
    //height: 128px;
    border-radius: 100%;
}

.user__image-wrapper {
    object-fit: fill;
    //width: 128px;
    //height: 128px;
    display: block;
}

</style>


<!--<script setup>-->
<!--import { useForm } from '@inertiajs/vue3'-->

<!--const props = defineProps({-->
<!--    size: {-->
<!--        type: Number,-->
<!--        default: 64-->
<!--    },-->
<!--    isChangeAvatar: {-->
<!--        type: Boolean,-->
<!--        default: false-->
<!--    }-->
<!--})-->

<!--const form = useForm({-->
<!--    avatar: null,-->
<!--})-->

<!--function submit() {-->
<!--    form.patch(route('profile.update'))-->
<!--}-->
<!--</script>-->

<!--<template>-->
<!--    <div class="profile-card__user-icon">-->
<!--        <a href="">-->
<!--            <VaIcon name="account_circle" :size="size" />-->
<!--        </a>-->

<!--    </div>-->
<!--    <form @submit.prevent="submit" v-if="isChangeAvatar">-->
<!--        <input type="file" @input="form.avatar = $event.target.files[0]" />-->
<!--        <button type="submit">Submit</button>-->
<!--    </form>-->
<!--</template>-->

<!--<style scoped>-->
<!--.va-icon:hover {-->
<!--    opacity: 0.7;-->
<!--    cursor: pointer;-->
<!--}-->
<!--</style>-->
