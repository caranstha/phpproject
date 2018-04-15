
<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();


?>



<script src="include/ckeditor/ckeditor.js"></script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="vi  ewport" content="width=device-width, initial-scale=1">
    <title>Haatbajar</title>
    <!-- Bootstrap core CSS -->
    <link href="../usercss/bootstrap.min.css" rel="stylesheet">
    <link href="../usercss/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>


           <?php include '../userinclude/header.php' ?>
            <?php include '../userinclude/slider.php' ?>

  
                <?php include '../userinclude/sidebar.php' ?>

                
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Our Products</h3>
              </div>


               <?php 
                      $result=$obj->showproduct();
                      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          
                        


                      ?>
              <div class="col-md-3">
                <div class="productimage">
                  <?php echo"<img src='../uploads/".$row['pimage']."' width='200px' height='250px'> "; ?>
                </div>
                <div class="product-info">
                   <?php echo $row['pname'];?><br>
                        Rs. <?php echo $row['pprice'];?>
                  
                </div>
             
              </div>
              <?php }}?>
              
              
                
                
              </div>
              </div>

             
              
          </div>
        </div>
      </div>
    </section>


                 <?php include '../userinclude/footer.php' ?>
      


    

    
   

    