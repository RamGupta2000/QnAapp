<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb:0">
    <a class="navbar-brand" href="Home.php">Navbar</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Home.php">Home</a>
        </li>
      </ul>
    </div>
    <div>
      <button
        class="btn btn-outline-success ml-2"
        data-toggle="modal"
        data-target="#loginModal"
      >
        Login
      </button>
      <button
        class="btn btn-outline-success mx-2"
        data-toggle="modal"
        data-target="#signupModal"
      >
        Signup
      </button>
    </div>
  </nav>

  <div class="col-md-4 my-2">
    <div class="card" style="width: 18rem">
      <img src="#" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">
          <a href="#">cat</a>
        </h5>
        <p class="card-text"></p>
        <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary"
          >View Threads</a
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>


<!--<style scoped>
.navbar {
  margin-bottom: 0 !important;
  border: 0 !important;
}
</style> -->