<?php session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}




?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Show Product</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
 <?php include '../include/header.php' ?>


    <section id="main">
      <div class="container">
        <div class="row">
           <?php include '../include/sidebar.php' ?>


          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Product List</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <a class="btn btn-primary glyphicon glyphicon-plus" href="addproduct.php">Add Product</a> 
                </div>
                <br>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                      <?php 
                      $result=$obj->showproduct();
                      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          
                        


                      ?>
                      <tr>
                         <td><?php echo $row['pid'];?></td>
                        <td><?php echo $row['pname'];?></td>
                        <td><?php echo $row['pprice'];?></td>
                        <td><?php 
                        $catid=$row['pcategory'];
                        $res=$obj->findcategory($catid);

                          if($res->num_rows>0)
                      {
                        while ($r=$res->fetch_assoc()) {



                        echo $r['categoryname'];?></td>
                        <?php } } ?>



                        <td><?php echo $row['pdesc'];?></td>
                        <td><?php echo"<img src='../uploads/".$row['pimage']."' width='60px' height='40px'>"; ?></td>
                        
                        <td><a class="btn btn-default" href="editproduct.php?id=<?php echo $row['id']?>">Edit</a> <a class="btn btn-danger" href="deleteproduct.php?id=<?php echo $row['id']?>" >Delete</a></td>
                      </tr>
                      <?php } } ?>
                    </table>
              </div>
              </div>
            
          </div>
        </div>
      </div>
    </section>

   <footer id="footer">
      <p>© Caran Shrestha</p>
    </footer>

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
