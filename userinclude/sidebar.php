 <section id="main">
      <div class="container">
        
          <div class="row justify-content-md-center">
              <div class="row">
<div class="col-md-3">


	<div class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu
     </div>

<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse0"><div>Categories</div></a>
        </h4>
      </div>

     
      <div id="collapse0" class="panel-collapse collapse">
         <?php $result=$obj->showcategory();
      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          

                      ?>

        <a href="category.php?category=<?php echo $row['id'];?>" class="list-group-item"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span><?php echo $row['categoryname']?> <span class="badge"></span></a>

        <?php }}?>
       

       
      </div>
    </div>
  </div>





	<!-- 
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              
              <a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Products <span class="badge">33</span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">203</span></a>
            </div> -->
            
  						</div>