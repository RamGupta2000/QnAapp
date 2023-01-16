<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 mt-4">
        <h2>Register</h2>

        <p class="text-danger" v-for="error in form.errors" :key="error">
          <span v-for="err in error" :key="err">{{ err }}</span>
        </p>

        <form @submit.prevent="register">
          <div class="form-group">
            <label for="name">Name:</label>
            <input
              type="text"
              class="form-control"
              id="name"
              v-model="form.name"
            />
          </div>
          <div class="form-group">
            <label for="email">Email Address:</label>
            <input
              type="email"
              class="form-control"
              id="emai"
              v-model="form.email"
            />
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input
              type="password"
              class="form-control"
              id="password"
              v-model="form.password"
            />
          </div>
          <div class="form-group">
            <label for="c_password">Confirm Password:</label>
            <input
              type="password"
              class="form-control"
              id="c_password"
              v-model="form.c_password"
            />
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, ref } from "@vue/reactivity";
import { useRouter } from "vue-router";
export default {
  setup() {
    const router = useRouter();

    let form = reactive({
      name: "",
      email: "",
      password: "",
      c_password: "",
    });
    let errors = ref([]);

    const register = async () => {
      axios
        .post("/api/register", form)
        .then(function (response) {
          if (response.data.message == "User register successfully") {
            localStorage.setItem("token", response.data.data.token);
            router.push({ name: "Dashboard" });
            // console.log("Hello");
          } else {
            if (Object.keys(response.data.message).length == 4) {
              window.alert("Please fill all the required input fields");
            } else if (response.data.message.name) {
              console.log(response.data.message);
              window.alert("Please enter the Name");
            } else if (response.data.message.email) {
              window.alert("Please enter the Email");
            } else if (response.data.message.password) {
              window.alert("Please enter the Password");
            } else if (
              response.data.message.c_password ||
              response.data.message.c_password ==
                "The c password and password must match."
            ) {
              window.alert("Please enter the c_password");
            }
          }
        })
        .catch((e) => {
          console.log(e);
          window.alert("Email Already Exist!");
        });
    };

    return {
      form,
      register,
      errors,
    };
  },
};
</script>