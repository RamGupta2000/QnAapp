<template>
  <div class="container mt-2">
    <form @submit.prevent="submitForm">
      <h1 class="py-2">Ask a Question</h1>
      <div class="form-group">
        <label>Question:</label>
        <textarea
          ref="Question"
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="1"
        ></textarea>
        <small id="emailHelp" class="form-text text-muted"
          >Keep your title as short and crisp as possible</small
        >
      </div>
      <div class="form-group">
        <label>Question Description:</label>
        <textarea
          ref="Description"
          class="form-control"
          id="exampleFormControlTextarea1"
          rows="2"
        ></textarea>
      </div>
      <button class="btn btn-success my-1" type="submit">Submit</button>
    </form>
  </div>
  <div class="container" id="ques">
    <!-- <h1 class="py-2">Browse Questions</h1> -->
    <div class="my-1">
      <h3>Below are some Questions :</h3>
      <div
        class="d-flex"
        v-for="Each_Questions_with_catTd in Questions_with_catTd"
        :key="Each_Questions_with_catTd.question_id"
      >
        <div class="media-body mb-3 d-flex">
          <div>
            <img
              src="http://127.0.0.1:5173/resources/js/components/img/userdefault.png"
              :style="{ width: '70px' }"
              class="mr-3"
              alt="..."
            />
          </div>
          <div>
            <div class="mt-0">
              <router-link
                class="text-dark"
                :to="{
                  name: 'Questions',
                  params: { ques_id: Each_Questions_with_catTd.question_id },
                }"
                v-if="Each_Questions_with_catTd"
                >{{ Each_Questions_with_catTd.question_title }}</router-link
              >
            </div>
            <div>
              {{ Each_Questions_with_catTd.question_desc }}
            </div>
          </div>
        </div>
        <div class="font-weight-bold my-0">Asked by : User ka email</div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { useRoute } from "vue-router";

export default {
  data() {
    return {
      ques: {
        title: "",
        desc: "",
        category_id: "",
      },
      Questions_with_catTd: "",
    };
  },
  mounted() {
    const route = useRoute();
    // console.log(route.params.lang_id);
    this.category_id = route.params.lang_id;

    if (this.category_id) {
      axios
        .get(`/api/questions/${route.params.lang_id}`)
        .then((response) => {
          this.Questions_with_catTd = response.data.data;
          // console.log(this.Questions_with_catTd[0].question_title);
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
  methods: {
    submitForm() {
      this.ques.title = this.$refs.Question.value;
      this.ques.desc = this.$refs.Description.value;

      this.$refs.Question.value = "";
      this.$refs.Description.value = "";

      if (this.ques.title && this.ques.desc) {
        axios
          .post("/api/questions/", {
            title: this.ques.title,
            description: this.ques.desc,
            ques_cat_id: this.category_id,
          })
          .then((res) => {
            if (res.status == 201 && this.category_id) {
              axios
                .get(`/api/questions/${this.category_id}`)
                .then((response) => {
                  this.Questions_with_catTd = response.data.data;
                })
                .catch((error) => {
                  console.log(error);
                });
            }
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        alert("Please fill Both the the given input fields!");
      }
    },
  },
};
</script>

<style>
.jumbotron {
  margin: 29px 74px;
  padding: 35px 54px;
  /* border: 2px solid black; */
  background-color: #e9ecef;
}
</style>
