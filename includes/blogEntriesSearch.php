<div class="col-md-8">
  <?php 
  if(isset($_POST['submit'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    displayEntries($query);
  }
  ?>
</div>