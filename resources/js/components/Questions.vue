<template>
  <!-- <div class="jumbotron">
    <h1 class="display-4">Question</h1>
    <p class="lead">
      Question desc : This is a simple hero unit, a simple jumbotron-style
      component for calling extra attention to featured content or information.
    </p>
    <hr class="my-4" />
    <p>
      It uses utility classes for typography and spacing to space content out
      within the larger container.
    </p>
    <p>Posted By :<em>Ram</em></p>
  </div> -->

  <div class="container mt-2">
    <h1 class="py-2">Write an Answer</h1>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Type your answer</label>
        <textarea
          ref="answer"
          class="form-control"
          id="comment"
          name="comment"
          rows="2"
        ></textarea>
        <input type="hidden" name="sno" value="" />
      </div>
      <button type="submit" class="btn btn-success my-2">Post Answer</button>
    </form>
  </div>

  <div class="container" id="ques">
    <h1 class="py-2">Discussions</h1>
    <div class="media my-3" v-for="answer in ans" :key="answer.ans_id">
      <div class="media my-3">
        <img
          src="http://127.0.0.1:5173/resources/js/components/img/userdefault.png"
          :style="{ width: '70px' }"
          class="mr-3"
          alt="..."
        />
        <div class="media-body">
          <p class="font-weight-bold my-0">Answered By : User ka email</p>
          {{ answer.ans }}
        </div>
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
      ans: {},
      ques_id: "",
    };
  },
  mounted() {
    const route = useRoute();
    this.ques_id = route.params.ques_id;
    // console.log("mount horyo");
    axios
      .get(`/api/answer/${this.ques_id}`)
      .then((response) => {
        this.ans = response.data.data;
        console.log(this.ans);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  methods: {
    submitForm() {
      this.ans = this.$refs.answer.value;
      this.$refs.answer.value = "";

      // console.log(this.ques_id);
      axios
        .post(`/api/answer/${this.ques_id}`, {
          ans: this.ans,
        })
        .then((response) => {
          console.log(response);
          if (response.status == 201) {
            axios
              .get(`/api/answer/${this.ques_id}`)
              .then((response) => {
                this.ans = response.data.data;
                console.log(this.ans);
              })
              .catch((error) => {
                console.log(error);
              });
          }
        })
        .catch((error) => {
          console.log(error);
        });
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