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
    <title>Admin Area | Show  Categories</title>
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
                <h3 class="panel-title">Categories</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <a class="btn btn-primary glyphicon glyphicon-plus" href="addcategory.php">Add Category</a> 
                </div>
                <br>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        
                         <th>Action</th>
                      </tr>
                      <?php 
                      $result=$obj->showcategory();
                      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          
                        


                      ?>
                      <tr>
                         <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['categoryname'];?></td>
                        
                        <td><a class="btn btn-danger" href="deletecategory.php?id=<?php echo $row['id'];?>">Delete</a></td>
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
