<script setup>
import RegisterForm from "@/components/forms/RegisterForm.vue";
import axios from "@/plugins/axios.js";

// console.log(backend)
// console.log(api)
// console.log(storage)
const fetchData = (formData) => {
  axios.post('/register', formData)
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
      <RegisterForm @fetch-data="fetchData" />
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