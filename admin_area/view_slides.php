<?php

   if(!isset($_SESSION['admin_email'])) {

    echo "<script> window.open('login.php','_self') </script>";
   }
   else{

?>

<div class="row">
    <div class="col-lg-12 mt-4">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Slides
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-tags fa-fw"></i> View Slides
                </h3>
            </div>

            <div class="card-body">
              <div class="row">
                <?php
                  
                  $get_slides = "select * from slider";

                  $run_slides = mysqli_query($con,$get_slides);

                  while($row_slides = mysqli_fetch_array($run_slides)) {

                    $slide_id = $row_slides['slide_id'];

                    $slide_name = $row_slides['slide_name'];

                    $slide_image = $row_slides['slide_image'];
                

                ?>

                    <div class="col-md-3 col-lg-3">
                        <div class="card text-white bg-primary">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                <?php echo $slide_name; ?>
                                </h3>
                            </div>

                            <div class="card-body bg-white">
                                <img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_image; ?>" class="img-fluid">
                            </div>

                            <div class="card-footer bg-white text-primary">
                            
                                <center>
                                
                                <a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="pull-right">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="pull-left">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                
                                </center>
                            
                            
                            </div>
                        </div>
                    </div>
                   <?php  } ?>
              </div> 
            </div>
        </div>
    </div>
</div>

<?php } ?>
