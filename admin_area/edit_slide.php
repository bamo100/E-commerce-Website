<?php

   if(!isset($_SESSION['admin_email'])) {

    echo "<script> window.open('login.php','_self') </script>";
   }
   else{

?>

<?php

   if(isset($_GET['edit_slide'])) {

    $edit_slide_id = $_GET['edit_slide'];

    $edit_slide = "select * from slider where slide_id='$edit_slide_id'";

    $run_edit_slide = mysqli_query($con,$edit_slide);

    $row_edit_slide = mysqli_fetch_array($run_edit_slide);

    $slide_id = $row_edit_slide['slide_id'];

    $slide_name = $row_edit_slide['slide_name'];

    $slide_url = $row_edit_slide['slide_url'];

    $slide_image = $row_edit_slide['slide_image'];

   }

?>

<div class="row">
    <div class="col-lg-12 mt-4">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit  Slide 
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-pencil fa-fw"></i> Edit  Slide
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Slide Name </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slide_name" required  value="<?php echo $slide_name;  ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Slide Url </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slide_url" required  value="<?php echo $slide_url;  ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> 

                               Slide Image

                        </label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="slide_image">
                            <br>
                            <img src="slides_images/<?php echo $slide_image;  ?>" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['update'])) {

    $slide_name = $_POST['slide_name'];

    $slide_url = $_POST['slide_url'];

    $slide_image = $_FILES['slide_image']['name'];

    $temp_name = $_FILES['slide_image']['tmp_name'];

    move_uploaded_file($temp_name,"slides_images/$slide_image");

    $update_slide = "update slider set slide_name='$slide_name',slide_url='$slide_url',slide_image='$slide_image' where
    slide_id='$slide_id'";

    $run_update_slide = mysqli_query($con,$update_slide);

    if($run_update_slide) {

        echo "<script> alert('Your Slide image has been UPDATED successfully') </script>";

        echo "<script> window.open('index.php?view_slides','_self') </script>";
    }


  }
  
?> 

<?php } ?>