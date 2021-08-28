<?php

   if(!isset($_SESSION['admin_email'])) {

    echo "<script> window.open('login.php','_self') </script>";
   }
   else{

?>

<?php

  if(isset($_GET['edit_term'])) {

     $edit_term_id = $_GET['edit_term'];

     $edit_term_query = "select * from terms where term_id='$edit_term_id'";

     $run_edit = mysqli_query($con,$edit_term_query);

     $row_edit = mysqli_fetch_array($run_edit);

     $term_id = $row_edit['term_id'];

     $term_title = $row_edit['term_title'];

     $term_link = $row_edit['term_link'];

     $term_desc = $row_edit['term_desc'];
  }

?>

<div class="row">
    <div class="col-lg-12 mt-4">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Term 
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-pencil fa-fw"></i> Edit Term
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Term Title </label>
                        <div class="col-md-6">
                            <input value="<?php echo $term_title;  ?>" type="text" class="form-control" name="term_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Term Link </label>
                        <div class="col-md-6">
                            <input value="<?php echo $term_link;  ?>" type="text" class="form-control" name="term_link" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Term Description </label>
                        <div class="col-md-6">
                            <textarea name="term_desc" type="text" class="form-control" col="30" rows="10"><?php echo $term_desc;  ?></textarea>
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <input value="Update Term" name="update" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['update'])) {

    $term_title = $_POST['term_title'];

    $term_link = $_POST['term_link'];

    $term_desc = $_POST['term_desc'];

    $update_term = "update terms set term_title='$term_title',term_desc='$term_desc' where term_id='$term_id'";

    $run_term = mysqli_query($con,$update_term);

    if($run_term) {

        echo "<script>  alert('Your TERMS & CONDITION SECTION has been UPDATED') </script>";

        echo "<script>  window.open('index.php?view_terms','_self') </script>";
    }

  }

?>

<?php } ?>


