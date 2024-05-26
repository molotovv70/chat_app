<script setup>
import axios from '@/plugins/axios'
import LoginForm from "@/components/forms/LoginForm.vue";


const fetchData = (formData) => {
  axios.post('/user', formData)
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.error('Ошибка при запросе:', error);
      })
      .finally(() => {
        console.log('Запрос завершен');
      });
};

</script>

<template>
  <div class="form__wrapper">
    <div class="form__container">
      <LoginForm @fetch-data="fetchData" />
    </div>
  </div>
</template>

<style scoped>
.form__wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #b4b4b4;
}

.form__container {
  padding: 50px;
  border-radius: 12px;
  background-color: #FFFFFF;
}
</style>