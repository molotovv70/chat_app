<script setup>

</script>

<template>
    <div class="message-box__wrapper">
        <div class="message-box">
            <div class="message-box__avatar">
<!--                <img src="" alt="" srcset="">-->
            </div>
            <div class="message-box__content">
                <div class="message-box-text">
                    hello, how do you feel today?
                </div>
                <div class="message-box__bottom">
    <!--               v-if reacions -->
                    <div  class="message-box__reactions">
<!--                        <VaButton icon="loyalty" round color="primary" />-->
<!--                        <VaButton icon="sell" round color="primary" />-->
<!--                        <VaButton icon="toys" round color="primary" />-->
                    </div>
                    <div class="message-box__time-container">
                        <span class="message-box__time-content">
                            22:03
                        </span>
                    </div>
                </div>
            </div>
            <div class="message-box__reply-btn">
                <VaButton icon="reply" round />
            </div>
        </div>
    </div>
</template>

<style scoped>
.message-box {
    display: flex;
    width: 100%;
    column-gap: 10px;
    padding: 10px;
    align-items: flex-end;
}
.message-box__avatar {
    height: 50px;
    width: 50px;
    background-color: #6b7280;
    border-radius: 100%;
}
.message-box__content {
    padding: 10px;
    max-width: 80%;
    border-radius: 15px 15px 15px 0px;
    background-color: #3472F0;
}
.message-box__bottom {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.message-box__time-content {
    font-size: 0.75em;
    opacity: 0.7;
}
</style>
