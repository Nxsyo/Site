<template>
  <form @submit.prevent="submit()">
    <input type="email" v-model="email" />
    <input type="password" v-model="password" />
    <button type="submit">Log in</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },

  methods: {
    submit() {
      this.$emit("submit", {
        email: this.email,
        password: this.password
      });
    }
  }
};
</script>