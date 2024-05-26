<script setup>
import { ref, watch } from "vue";

const emit = defineEmits(['fetch-data']);

const checkbox = ref({
  flag: false,
  label: "Remember Me",
})
const form = ref({
  login: '',
  password: '',
  isRemember: checkbox.value.flag,
})

watch(() => checkbox.value.flag, (newVal) => {
  form.value.isRemember = newVal;
});

const handleSubmit = () => {
  emit('fetch-data', form.value);
}
</script>

<template>
  <VaForm
      class="form"
      tag="form"
      @submit.prevent="handleSubmit"
  >
    <VaInput
        v-model="form.login"
        label="Username"
        placeholder="Enter Username | Email"
    >
      <template #prependInner>
        <VaIcon
            name="perm_identity"
            color="secondary"
        />
      </template>
    </VaInput>

    <VaInput
        v-model="form.password"
        class="mt-3"
        type="password"
        label="Password"
        placeholder="Enter password"
    >
      <template #prependInner>
        <VaIcon
            name="key"
            color="secondary"
        />
      </template>
    </VaInput>

    <VaCheckbox
        v-model="checkbox.flag"
        class="mt-3 form__checkbox"
        :label="checkbox.label"
    />

    <div class="form__btns mt-3">
      <RouterLink to="/register">
        <VaButton
            type="submit"
            class="form__register-btn"
            color="danger"
            gradient
            icon-right="arrow_forward"
            icon-color="#ffffff50"
        >
          Register
        </VaButton>
      </RouterLink>
      <VaDivider vertical />
      <VaButton
          @click.prevent="handleSubmit"
          class="form__login-btn"
          gradient
          icon-right="home"
          icon-color="#ffffff50"
      >
        Login
      </VaButton>
    </div>
  </VaForm>
</template>

<style scoped>
.form {
  display: flex;
  flex-direction: column;
  width: fit-content;
}

.form__btns {
  display: flex;
  flex-direction: row;

}

.form__checkbox {
  align-self: baseline;
}

.form__login-btn  {
  //width: fit-content;
  flex-grow: 1;
}

.form__register-btn {
  flex-grow: 1;
}
.va-button__left-icon {
  display: block;
  width: 10px;
  padding: 0;
}
</style>