<template>
  <div class="container my-4 d-flex" id="ques">
    <div class="row">
      <div class="col-md-4 my-3" v-for="names in name" :key="names">
        <div class="card" style="width: 18rem">
          <img :src="`http://127.0.0.1:5173/resources/js/components/img/${names.category_name}.jpg`"
            class="card-img-top" alt="..." />
          <div class="card-body">
            <p class="card-text">
              {{ names.category_desc }}
            </p>
            <div class="d-flex justify-content-center align-items-center">
              <button class="btn btn-success">
                <router-link class="text-light no-underline" :to="{
                  name: 'Questions',
                  params: { lang_id: names.category_id },
                }" v-if="names">{{ names.category_name }}</router-link>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
    });
  },
};
</script>

<style>
.no-underline {
  text-decoration: none;
}
</style>