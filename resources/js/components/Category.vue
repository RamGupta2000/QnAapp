<template>
  <div class="jumbotron">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead">
      This is a simple hero unit, a simple jumbotron-style component for calling
      extra attention to featured content or information.
    </p>
    <hr class="my-4" />
    <p>
      It uses utility classes for typography and spacing to space content out
      within the larger container.
    </p>
    <p class="lead">
      <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
    </p>
  </div>

  <div class="container">
    <h1 class="py-2">Start a Discussion</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Problem Title</label>
        <input
          type="text"
          class="form-control"
          id="title"
          name="title"
          aria-describedby="emailHelp"
        />
        <small id="emailHelp" class="form-text text-muted"
          >Keep your title as short and crisp as possible</small
        >
      </div>
      <input type="hidden" name="sno" value="" />
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
        <textarea
          class="form-control"
          id="desc"
          name="desc"
          rows="3"
        ></textarea>
      </div>
      <button type="submit" class="btn btn-success my-2">Submit</button>
    </form>
  </div>
  <div class="container">
    <h1 class="py-2">Start a Discussion</h1>
    <p class="lead">
      You are not logged in. Please login to be able to start a Discussion
    </p>
  </div>

  <div class="container" id="ques">
    <h1 class="py-2">Browse Questions</h1>

    <div class="media my-3">
      <img src="./img/userdefault.png" width="54px" class="mr-3" alt="..." />
      <div class="media-body">
        <h5 class="mt-0">
          <a class="text-dark" href="thread.php?threadid=' . $id. '">title </a>
        </h5>
        $desc
      </div>
      <div class="font-weight-bold my-0">Asked by</div>
    </div>
  </div>
</template>

<script>
</script>

<style>
.jumbotron {
  margin: 29px 74px;
  padding: 35px 54px;
  /* border: 2px solid black; */
  background-color: #e9ecef;
}
</style>