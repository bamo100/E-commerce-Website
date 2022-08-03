



<div class="card sidebar-menu mb-2">
  <h6 class="card-header">
    Manufacturers

    <div class="pull-right">
    
       <a href="#" style="color:black;">
       
          <span class="nav-toggle hide-show">
           
            Hide
          
          </span>
       
       </a>

    </div>
  </h6>

  <div class="card-collapse collapse-data">

  input.form-control#dev-manufacturer
  
    <ul class="list-group list-group-flush category-menu"> 
      <?php  
        
        getPCats(); 
        
      ?>
    </ul>

  </div>
</div>

<div class="card sidebar-menu mb-2">
  <h6 class="card-header">
     Categories
 </h6>
  <ul class="list-group list-group-flush category-menu">
     <?php  
       
       getCats();
      
     ?>
  </ul>
</div> 