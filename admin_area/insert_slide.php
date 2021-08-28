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
                <i class="fa fa-dashboard"></i> Dashboard / Insert  Slide
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-money fa-fw"></i> Insert  Slide
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Slide Name </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slide_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Slide Url </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slide_url" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> 
                         
                           <!-- <div class="col-md-6"> -->
                               Slide Image
                           <!-- </div>  -->
                         
                        </label>
                        <div class="col-md-6">
                            <input type="file" class="form-control" name="slide_image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <!-- <input value="Submit Category" name="submit" type="submit" class="form-control btn btn-primary"> -->
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['submit'])) {

    $slide_name = $_POST['slide_name'];

    $slide_url = $_POST['slide_url'];

    $slide_image = $_FILES['slide_image']['name'];

    $temp_name = $_FILES['slide_image']['tmp_name'];

    $view_slides = "select * from slider";

    $view_run_slide = mysqli_query($con,$view_slides);

    $count = mysqli_num_rows($view_run_slide);

    if($count<4) {

        move_uploaded_file($temp_name,"slides_images/$slide_image");

        $insert_slide = "insert into slider (slide_name,slide_url,slide_image) values ('$slide_name','$slide_url','$slide_image')";

        $run_slide = mysqli_query($con,$insert_slide);

        echo "<script> alert('Your Slide image has been inserted') </script>";

        echo "<script> window.open('index.php?view_slides','_self') </script>";
    }
    else{

        echo "<script> alert('Your have already inserted 4 slides') </script>";
    }
  }
  
?>

<?php } ?>