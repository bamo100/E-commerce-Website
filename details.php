 <?php

   include("includes/header.php");
  
  ?>

  <div id="content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Shop
                    </li>
                    <li class="breadcrumb-item">
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>
                    </li>
                    <li class="breadcrumb-item"> <?php echo $pro_title; ?> </li>
                </ol>
              </div>

              <div class="col-md-3">
                <?php

                include("includes/sidebar.php");

                ?>
              </div>

              <div class="col-md-9">
                  <div id="productMain" class="row">

                      <div class="col-sm-6">
                          <div id="mainImage">
                               <div id="mycarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="img-fluid" src="admin_area/product_images/<?php echo $pro_img1; ?>" class="d-block w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="img-fluid" src="admin_area/product_images/<?php echo $pro_img2; ?>" class="d-block w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="img-fluid" src="admin_area/product_images/<?php echo $pro_img3; ?>" class="d-block w-100">
                                        </div>
                                    </div>
                                        <ol class="carousel-indicators">
                                            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#mycarousel" data-slide-to="1"></li>
                                            <li data-target="#mycarousel"data-slide-to="2"></li>
                                        </ol>
                                        <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                              </div>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="box">
                              <h4 class="text-center"> <?php echo $pro_title; ?> </h4>

                              <?php  add_cart();  ?>
                              
                              <form action="details.php?add_cart=<?php echo $product_id; ?>" method="POST" class="form-horizontal">
                                  <div class="form-group">
                                      <label for="" class="col-md-5 control-label">Products Quantity</label>
                                       
                                      <div class="col-md-7">
                                          <select name="product_qty" class="form-control"> 
                                              <option>1</option>
                                              <option>2</option>
                                              <option>3</option>
                                              <option>4</option>
                                              <option>5</option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-md-5 control-label">Product Size</label>

                                      <div class="col-md-7">
                                          <select name="product_size"  class="form-control" required oninput="setCustomValidity('')"
                                           oninvalid="setCustomValidity('Must pick 1 size for the product')">
                                              <option disabled selected>Select a size</option>
                                              <option>Small</option>
                                              <option>Medium</option>
                                              <option>Large</option>
                                          </select>
                                      </div>
                                  </div>

                                  <p class="price"> $ <?php echo $pro_price; ?></p>
                                  <p class="text-center buttons"><button class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to Cart</button></p>
                              </form>
                          </div>

                          <div class="row" id="thumbs">
                              <div class="col-md-4">
                                  <a href="" class="thumb" data-target="#mycarousel" data-slide-to="0" class="active">
                                      <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="" class="img-fluid">
                                  </a>
                              </div>

                              <div class="col-md-4">
                                  <a href="" class="thumb" data-target="#mycarousel" data-slide-to="1" class="active">
                                      <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="" class="img-fluid">
                                  </a>
                              </div>

                              <div class="col-md-4">
                                  <a href="" class="thumb" data-target="#mycarousel" data-slide-to="2" class="active">
                                      <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="" class="img-fluid">
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="box" id="details">
                        <h4>Product Details</h4>
                      <p>
                         <?php echo $pro_desc; ?>
                      </p>

                      <h4>Size</h4>

                      <ul>
                          <li>Small</li>
                          <li>Medium</li>
                          <li>Large</li>
                      </ul>

                      <hr>
                  </div>

                  <div class="row" id="row same-height-row">
                      <div class="col-sm-6 col-md-3">
                          <div class="box same-height headline">
                              <h3 class="text-center">Products You May Like</h3>
                          </div>
                      </div>
                       <?php

                           $get_products = "select * from products order by rand() LIMIT 0,3";

                           $run_products = mysqli_query($con,$get_products);

                           while($row_products = mysqli_fetch_array($run_products)) {

                                $pro_id = $row_products['product_id'];

                                $pro_title = $row_products['product_title'];

                                $pro_img1 = $row_products['product_img1'];

                                $pro_price = $row_products['product_price'];

                                echo "
                                 <div class='col-sm-6 col-md-3 center-responsive'>
                                 
                                    <div class='product'>
                                    
                                      <a href='details.php?pro_id=$pro_id'>
                                      
                                         <img class='img-fluid' src='admin_area/product_images/$pro_img1'>
                                      
                                      </a>
                                      <div class='text'>

                                         <h3> <a href='details.php?pro_id=$pro_id'>$pro_title</a> </h3>

                                         <p class='price'>$ $pro_price</p>
                                    
                                      </div>

                                    </div>  
                                 
                                 </div>
                                
                                ";
                             
                           }


                       ?>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <?php

   include("includes/footer.php");

  ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>