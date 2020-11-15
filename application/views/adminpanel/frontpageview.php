<?php $this->load->view('adminpanel/header.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin panel</h1>
        
          
          </div>
          <div class="row">
            <div class="col-md-3 alert alert-primary" role="alert">
            <a href="<?= base_url().'admin/posts/createpost'?>">Create Post</a>
          </div>

          <div class="col-md-1"></div>

          <div class="col-md-3 alert alert-warning" role="alert">
            <a href="<?= base_url().'admin/posts'?>">Read post</a>
          </div>

      </div>      
    </main>
  </div>
</div>

     <?php $this->load->view('adminpanel/footer.php'); ?>