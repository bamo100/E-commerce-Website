<?php

   if(!isset($_SESSION['admin_email'])) {

    echo "<script> window.open('login.php','_self') </script>";
   }
   else{

?>

<?php

  if(isset($_GET['edit_cat'])) {

     $edit_cat_id = $_GET['edit_cat'];

     $edit_cat_query = "select * from categories where cat_id='$edit_cat_id'";

     $run_edit = mysqli_query($con,$edit_cat_query);

     $row_edit = mysqli_fetch_array($run_edit);

     $cat_id = $row_edit['cat_id'];

     $cat_title = $row_edit['cat_title'];

     $cat_desc = $row_edit['cat_desc'];
  }

?>

<div class="row">
    <div class="col-lg-12 mt-4">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit ategory
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-pencil fa-fw"></i> Edit Category
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Category Title </label>
                        <div class="col-md-6">
                            <input value="<?php echo $cat_title;  ?>" type="text" class="form-control" name="cat_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Category Description </label>
                        <div class="col-md-6">
                            <textarea name="cat_desc" type="text" class="form-control" col="30" rows="10"><?php echo $cat_desc;  ?></textarea>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <input value="Update Category" name="update" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['update'])) {

    $cat_title = $_POST['cat_title'];

    $cat_desc = $_POST['cat_desc'];

    $update_cat = "update categories set cat_title='$cat_title',cat_desc='$cat_desc' where cat_id='$cat_id'";

    $run_cat = mysqli_query($con,$update_cat);

    if($run_cat) {

        echo "<script>  alert('Your Category has been UPDATED') </script>";

        echo "<script>  window.open('index.php?view_cats','_self') </script>";
    }

  }

?>

<?php } ?>


