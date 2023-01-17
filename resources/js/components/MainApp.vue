<template>
  <!-- <div><h1>This is main-app.vue</h1></div> -->
  <router-view></router-view>
  <div class="container my-4 d-flex" id="ques">
    <div class="row">
      <div class="col-md-4 my-3" v-for="names in name" :key="names">
        <div class="card" style="width: 18rem">
          <img src="./img/abc.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title">
              <!-- <a href="#">cat</a> -->
            </h5>
            <p class="card-text"></p>
            <button class="btn btn-primary">
              <router-link
                class="text-light"
                :to="{ name: 'Questions' }"
                v-if="names"
                >{{ names.category_name }}</router-link
              >
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <router-view></router-view> -->
</template>

<script>
export default {
  data() {
    return {
      name: [],
    };
  },
  mounted() {
    axios.get("/api/category").then((res) => {
      this.name = res.data.data;
      // console.log(this.name);
    });
  },
};
</script>

<style>
</style>