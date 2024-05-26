<script setup>
import { ref, watch } from "vue";

const emit = defineEmits(['fetch-data']);

const checkbox = ref({
  flag: false,
  label: "Remember Me",
})
const form = ref({
  name: '',
  email: '',
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
        v-model="form.name"
        label="Username"
        placeholder="Enter Username"
    >
      <template #prependInner>
        <VaIcon
            name="perm_identity"
            color="secondary"
        />
      </template>
    </VaInput>

    <VaInput
        v-model="form.email"
        class="mt-3"
        label="Email"
        placeholder="Enter email"
    >
      <template #prependInner>
        <VaIcon
            name="mail_outline"
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
      <VaButton
          @click.prevent="$router.go(-1)"
          gradient
          icon="chevron_left"
          icon-color="#ffffff50"
      >
        Back
      </VaButton>
      <VaDivider vertical />
      <VaButton
          @click.prevent="handleSubmit"
          color="danger"
          class="form__register-btn"
          gradient
          icon-right="arrow_forward"
          icon-color="#ffffff50"
      >
        Register
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
}

.form__checkbox {
  align-self: baseline;
}

.form__login-btn {
  flex-grow: 1;
}

.form__register-btn {
  flex-grow: 1;
  //width: max-content;
}
</style>