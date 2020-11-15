<?php $this->load->view('adminpanel/header.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

      <h2>Read Post</h2>

      <?php
            // echo <"pre">;
            // print_r($result); die();
      ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Title</th>
              <th width="100px">Description</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php

                if($result)
                {
                  $counter=1;
                  foreach ($result as $key => $value) 
                  {
                    echo   "<tr>
              <td>".$counter."</td>
              <td>".$value['post_title']."</td>
              <td>".$value['post_desc']."</td>
              <td><img src='".base_url().$value['post_img']."' class='img-fluid' width='100'></td>
              <td><a class=\"btn btn-info\" href='". base_url().'admin/posts/updatepost/'.$value['postid']."'>Update</td>
              <td><a class=\"btn delete btn-danger\" href='#.' data-id='".$value['postid']."'>Delete</td>
              </tr>";

              $counter++;
                  }
               
                }
                else
                {
                  echo "<tr><td colspan ='6'> No records found</td></tr>";
                }
                  

            ?>

            
          </tbody>
        </table>
      </div>
      
    </main>
  </div>
</div>

    <?php $this->load->view('adminpanel/footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">$(".delete").click(function()
    {
      //alert("Are u sure");
      //alert($(this).attr('data-id'));
      var delete_id = $(this).attr('data-id');
      var bool = confirm('Are u sure to delete');
      console.log(bool);
       if (bool) 
       {
         //alert("Move to delete");
          $.ajax({
           url:'<?= base_url().'admin/posts/deletepost/'?>',
           type:'post',
           data:{'delete_id': delete_id},
           success: function(response)
           {
             console.log(response);
             if(response == "deleted")
             {
              location.reload();
             }
             else if(response == "not deleted")
             {
              alert("Something went wrong");
             }
           }
         });
       }
       else
       {
         alert("Your Post is safe");
       }

});

    <?php 
        if(isset($_SESSION['updated']))
        {
          if ($_SESSION['updated'] == "yes")
          {
            echo 'alert("Data is been updated")';
          }
          else if ($_SESSION['updated'] == "yes") 
          {
            echo 'alert("Something went wrong")';
          }
        }
     ?>
</script>