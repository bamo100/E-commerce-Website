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
                <i class="fa fa-dashboard"></i> Dashboard / View Terms
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-tags fa-fw"></i> View Terms
                </h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th> Term ID </th>
                                <th> Term Title </th>
                                <th> Term Link </th>
                                <th> Term Desc </th>
                                <th> Edit Category </th>
                                <th> Delete Category </th>
                            </tr>
                        </thead>

                        <tbody>
 
                          <?php 

                            $i=0;

                            $get_terms = "select * from terms";

                            $run_terms = mysqli_query($con,$get_terms);

                            while($row_terms = mysqli_fetch_array($run_terms)) {

                                $term_id = $row_terms['term_id'];

                                $term_title = $row_terms['term_title'];

                                $term_link = $row_terms['term_link'];

                                $term_desc = $row_terms['term_desc'];

                                $i++;

                          ?>

                          <tr>
                              <td> <?php echo $term_id; ?> </td>
                              <td> <?php echo $term_title; ?> </td>
                              <td> <?php echo $term_link; ?> </td>
                              <td width="300">  <?php echo $term_desc; ?> </td>
                              <td> 
                                  <a href="index.php?edit_term=<?php echo $term_id; ?>">
                                  <i class="fa fa-pencil"></i> Edit</a> 
                              </td>
                              <td>
                                  <a href="index.php?delete_term=<?php echo $term_id; ?>">
                                  <i class="fa fa-trash"></i> Delete</a>
                              </td>
                          </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>