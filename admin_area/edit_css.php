<?php

   if(!isset($_SESSION['admin_email'])) {

    echo "<script> window.open('login.php','_self') </script>";
   }
   else{

?>

<?php  

  $file = "../style/style.css";

  if(file_exists($file)) {

    $data = file_get_contents($file);

  }


?>

<div class="row">
    <div class="col-lg-12 mt-4">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / CSS Editor
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    
                  <i class="fa fa-pencil"></i> CSS Editor

                </h3>
            </div>
            <div class="card-body">

               <form action="" method="POST">
                   <div class="form-group row">
                        <div class="col-lg-12">
                            <textarea name="newdata" id="" rows="15" class="form-control"> <?php echo $data; ?> </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                       <label for="" class="col-md-3 col-form-label-lg"></label>

                       <div class="col-md-6">
                          <input type="submit" name="update"  value="Update CSS" class="form-control btn btn-primary">
                       </div>
                    </div>
               </form>

            </div>
        </div>
    </div>
</div>

<?php

 if(isset($_POST['update'])) {

    $newdata = $_POST['newdata'];

    $handle = fopen($file, "W");

    fwrite($handle, $newdata);

    fclose($handle);

    echo "<script> alert('Your CSS has been Updated') </script>";
    echo "<script> window.open('index.php?edit_css','_self') </script>";

 }

?>


<?php } ?>