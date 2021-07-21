<?php
include "./includes/db.php";

// Dynamically Display the categories links as a list
function displayLinks($query) {
  global $connection;
  $result = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($result)) {
      $cat_title = $row['cat_title'];
      echo "<li><a href='#'>{$cat_title}</a></li>";
  }
}

// Dynamically displays the blog posts
function displayEntries($query) {
  global $connection;
  $result = mysqli_query($connection, $query);
  if(!$result) die("QUERY FAILED" . mysqli_error($connection));
  $count = mysqli_num_rows($result);
  if($count === 0) {
    echo "<h1>No Results</h1>";
    return;
  }
  while($row = mysqli_fetch_assoc($result)) {
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_image = $row['post_image'];
      $post_content= $row['post_content'];
      ?>
        <h1 class="page-header">
      Page Heading
      <small>Secondary Text</small>
      </h1>

      <!-- First Blog Post -->
      <h2>
          <a href="#"><?php echo $post_title ?></a>
      </h2>
      <p class="lead">
          by <a href="index.php"><?php echo $post_author ?></a>
      </p>
      <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
      <hr>
      <img class="img-responsive" src="./images/<?php echo $post_image ?>" alt="">
      <hr>
      <p><?php echo $post_content ?></p>
      <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

      <hr>
      <?php
  }
}
