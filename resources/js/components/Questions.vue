<template>
  <div class="jumbotron">
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
  </div>

  <div class="container">
    <h1 class="py-2">Post a Comment</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Type your comment</label>
        <textarea
          class="form-control"
          id="comment"
          name="comment"
          rows="2"
        ></textarea>
        <input type="hidden" name="sno" value="" />
      </div>
      <button type="submit" class="btn btn-success my-2">Post Comment</button>
    </form>
  </div>

  <div class="container" id="ques">
    <h1 class="py-2">Discussions</h1>
    <div class="media my-3">
      <div class="media my-3">
        <img src="./img/userdefault.png" width="54px" class="mr-3" alt="..." />
        <div class="media-body">
          <p class="font-weight-bold my-0">
            sakshi@gmail.com at 2022-12-06 10:02:17
          </p>
          content
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Questions",
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