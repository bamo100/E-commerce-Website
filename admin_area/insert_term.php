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
                <i class="fa fa-dashboard"></i> Dashboard / Create  Terms
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-money fa-fw"></i> Create  Terms
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Term Title </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="term_title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Term Link </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="term_link" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"> Term Description </label>
                        <div class="col-md-6">
                            <textarea name="term_desc" type="text" class="form-control" col="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3 col-form-label-lg"></label>
                        <div class="col-md-6">
                            <input value="Create Term" name="submit" type="submit" class="form-control btn btn-primary">
                        </div>
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</div>

<?php

  if(isset($_POST['submit'])) {

    $term_title = $_POST['term_title'];

    $term_link = $_POST['term_link'];

    $term_desc = $_POST['term_desc'];

    $insert_term = "insert into terms (term_title,term_link,term_desc) values ('$term_title','$term_link','$term_desc')";

    $run_term = mysqli_query($con,$insert_term);

    if($run_term) {

        echo "<script> alert('A NEW TEXT has been INSERTED INTO TERMS & CONDITIONS SECTION') </script>";

        echo "<script> window.open('index.php?view_terms','_self') </script>";
    }
  }

?>

<?php } ?>