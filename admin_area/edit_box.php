<?php

   if(!isset($_SESSION['admin_email'])) {

    echo "<script> window.open('login.php','_self') </script>";
   }
   else{

?>

<?php

  if(isset($_GET['edit_box'])) {

     $edit_box_id = $_GET['edit_box'];

     $edit_box_query = "select * from boxes_section where box_id='$edit_box_id'";

     $run_edit_box = mysqli_query($con,$edit_box_query);

     $row_edit_box = mysqli_fetch_array($run_edit_box);

     $box_id = $row_edit_box['box_id'];

     $box_title = $row_edit_box['box_title'];

     $box_desc = $row_edit_box['box_desc'];
  }

?>

<div class="row">
    <div class="col-lg-12 mt-4">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Box
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-pencil fa-fw"></i> Edit Box
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Box Title </label>
                        <div class="col-md-6">
                            <input value="<?php echo $box_title;  ?>" type="text" class="form-control" name="box_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Box Description </label>
                        <div class="col-md-6">
                            <textarea name="box_desc" type="text" class="form-control" col="30" rows="10"><?php echo $box_desc;  ?></textarea>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <input value="Update Box" name="update" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['update'])) {

    $box_title = $_POST['box_title'];

    $box_desc = $_POST['box_desc'];

    $update_box = "update boxes_section set box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";

    $run_box = mysqli_query($con,$update_box);

    if($run_box) {

        echo "<script>  alert('Your BOX SECTION has been UPDATED') </script>";

        echo "<script>  window.open('index.php?view_boxes','_self') </script>";
    }

  }

?>

<?php } ?>


