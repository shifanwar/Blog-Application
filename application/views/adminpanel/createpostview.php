<?php $this->load->view('adminpanel/header.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

      <h2>Create Post</h2>

      <form enctype="multipart/form-data" action="<?= base_url().'admin/posts/createpost_post' ?>" method="post">

      <div class="form-group">
      <input type="text" class="form-control" name="post_title" placeholder="Title">
      </div>

      <div class="form-group">
      <textarea class="form-control" name="post_desc" placeholder="Description"></textarea>
      </div>

      <div class="form-group">
      <input type="file" class="form-control" name="post_img" placeholder="Title">
      </div>

      <button class="btn btn-primary" type="submit">Create post</button>

      </form>
      
    </main>
  </div>
</div>

    <?php $this->load->view('adminpanel/footer.php'); ?>

    <script type="text/javascript">
      <?php
      if (isset($_SESSION['inserted']))
      {
        if ($_SESSION['inserted']=="yes")
        {
          echo "alert('Data inserted succesfully')";
        }
        else
        {
          echo "alert('Data not inserted')";
        }
      }
      ?>
    </script>