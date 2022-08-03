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
                <i class="fa fa-dashboard"></i> Dashboard / Insert  New  Box
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-money fa-fw"></i> Insert  Box
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Box Title </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="box_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Box Description </label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="box_desc" rows="6"  cols="18" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <!-- <input value="Submit Category" name="submit" type="submit" class="form-control btn btn-primary"> -->
                            <input type="submit" name="submit" value="Insert Box" class="btn btn-primary form-control">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['submit'])) {

    $box_title = $_POST['box_title'];

    $box_desc = $_POST['box_desc'];

    $insert_box = "insert into boxes_section (box_title,box_desc) values ('$box_title','$box_desc')";

    $run_box = mysqli_query($con,$insert_box);

    echo "<script>  alert('New BOX has been INSERTED') </script>";
    echo "<script>  window.open('index.php?view_boxes','_self') </script>";

  }
  
?>

<?php } ?>