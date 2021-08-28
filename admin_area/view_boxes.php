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
                <i class="fa fa-dashboard"></i> Dashboard / View Boxes
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-tags fa-fw"></i> View Boxes
                </h3>
            </div>

            <div class="card-body">
              <div class="row">
                <?php
                  
                  $get_boxes = "select * from boxes_section";

                  $run_boxes = mysqli_query($con,$get_boxes);

                  while($row_boxes_section = mysqli_fetch_array($run_boxes)) {

                    $box_id = $row_boxes_section['box_id'];

                    $box_title = $row_boxes_section['box_title'];

                    $box_desc = $row_boxes_section['box_desc'];
                

                ?>

                    <div class="col-md-4 col-lg-4">
                        <div class="card text-white bg-primary">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                   <?php echo $box_title; ?>
                                </h3>
                            </div>

                            <div class="card-body bg-white text-dark">
                                <?php echo $box_desc; ?>
                            </div>

                            <div class="card-footer bg-white text-primary">
                            
                                <center>
                                
                                <a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-right">
                                    <i class="fa fa-trash"></i> Delete
                                </a>

                                <a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-left">
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
