<template>
  <!-- <div>Navbar.vue</div> -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <a class="navbar-brand" href="Home.php">Navbar</a> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link class="text-white" :to="{ name: 'Mainapp' }"
            >Home</router-link
          >
          <router-link class="text-white ml-2" :to="{ name: 'Dashboard' }"
            >Dashboard</router-link
          >
          <!-- <button type="button" class="btn btn-dark mt-2" @click="logout">
            Logout
          </button> -->
        </li>
      </ul>
    </div>
    <div>
      <!-- <router-link to="/signin">Login</router-link> -->
      <!-- Might need to change /signup to /register "CHECK" -->
      <!-- <router-link class="ml-2" to="/signup">Signup</router-link> -->
      <router-link class="text-white" :to="{ name: 'Login' }"
        >Login</router-link
      >
      <router-link class="text-white ml-2" :to="{ name: 'Register' }"
        >Register</router-link
      >
    </div>
  </nav>

  <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <router-link class="navbar-brand" :to="{name :'Home' }">Home</router-link>
    <ul class="navbar-nav">
      <li class="nav-item">
        <router-link class="text-white" :to="{ name: 'Login' }"
          >Login</router-link
        >
      </li>
      <li class="nav-item">
        <router-link class="text-white ml-2" :to="{ name: 'Register' }"
          >Register</router-link
        >
      </li>
    </ul>
    <router-view></router-view>
  </nav> -->
</template>

<script>
// export default {
//   name: "Navbar",
// };

import { useRouter } from "vue-router";
export default {
  setup() {
    const router = useRouter();

    function logout() {
      localStorage.removeItem("token");
      router.push({ name: "Mainapp" });
    }
    return {
      logout,
    };
  },
};
</script>



<style scoped>
</style>