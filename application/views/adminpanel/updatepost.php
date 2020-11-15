<?php //echo "<pre>"; print_r($result); die(); ?>

<?php $this->load->view('adminpanel/header.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

      <h2>Update Post</h2>

      <form enctype="multipart/form-data" action="<?= base_url().'admin/posts/updatepost_post' ?>" method="post">

        <select class="custome_select" name="publish_unpublish">
          <!-- <option selected>Select option</option> -->
          <option value="1" <?= ($result[0]['status'] == "1" ? "selected" : ""); ?>>Publish</option>
          <option value="0"<?= ($result[0]['status'] == "0" ? "selected" : ""); ?>>Unpublish</option>
        </select>
        <br>

        <input type="hidden" name="postid" value="<?= $postid ?>">

      <div class="form-group" style="margin-top: 10px;">
      <input type="text" value="<?= $result[0]['post_title'] ?>" class="form-control" name="post_title" placeholder="Title">
      </div>

      <div class="form-group">
      <textarea class="form-control" name="post_desc" placeholder="Description"><?= $result[0]['post_desc'] ?></textarea>
      </div>

      <div class="form-group">
        <img width='100' src="<?= base_url(). $result[0]['post_img'] ?>">
      <input type="file" class="form-control" name="post_img" placeholder="Title">
      </div>

      <button class="btn btn-primary" type="submit">Update post</button>

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