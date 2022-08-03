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
                <i class="fa fa-dashboard"></i> Dashboard / Insert  Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-money fa-fw"></i> Insert  Category
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Category Title </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cat_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Category Description </label>
                        <div class="col-md-6">
                            <textarea name="cat_desc" type="text" class="form-control" col="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <input value="Submit Category" name="submit" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['submit'])) {

    $cat_title = $_POST['cat_title'];

    $cat_desc = $_POST['cat_desc'];

    $insert_cat = "insert into categories (cat_title,cat_desc) values ('$cat_title','$cat_desc')";

    $run_cat = mysqli_query($con,$insert_cat);

    if($run_cat) {

        echo "<script> alert('Your CATEGORY has been INSERTED') </script>";

        echo "<script> window.open('index.php?view_cats','_self') </script>";
    }
  }

?>

<?php } ?>