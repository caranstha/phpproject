
<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}

if(isset($_POST['submit']))
  {
    $quotation=$_POST['quotation'];
    $file=$_FILES['image']['name'];
    $temp_location=$_FILES['image']['tmp_name'];
    $_destination="../uploads/";
    move_uploaded_file($temp_location,$_destination.$file);
    $res=$obj->addsliderimage($quotation,$file);
  
    if($res)
    {
      header('location:addsliderimage.php');

    }
   
}
?>
 <script src="include/ckeditor/ckeditor.js"></script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Add Slider Image</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

           <?php include '../include/header.php' ?>

   

    <section id="main">
      <div class="container">
        
          <div class="row justify-content-md-center">
              

               
                  <div class="row">
                     <?php include '../include/sidebar.php' ?>
          <div class="col-md-9">


            <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Slider Image</h3>
              </div>
            <form id="login" action="" class="well" method="POST" enctype = "multipart/form-data">

                  <div class="form-group">
                    <label>Quotation</label>
                    <input type="text" class="form-control" placeholder="Enter Your the Quotation" name="quotation" required>
                  </div>

                  <div class="form-group" class="file btn btn-lg btn-primary">
                    <label>Slider Image</label>
                    <input type="file" class="form-control"  name="image" required="">
                  </div>



                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-primary btn-block">Save Image</button>
              </form>



              <table class="table table-striped table-hover">
                      <tr>
                        <th>Id</th>
                        <th>Quotation</th>
                        
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                      <?php 
                      $result=$obj->showslideriamge();
                      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          
                        


                      ?>
                      <tr>
                         <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['quotation'];?></td>
                        
                        <td><?php echo"<img src='../uploads/".$row['sliderimage']."' width='60px' height='40px'>"; ?></td>
                        
                        <td> <a class="btn btn-danger" href="deleteslider.php?id=<?php echo $row['id']?>" >Delete</a></td>
                      </tr>
                      <?php } } ?>
                    </table>
          </div>
        </div>

      
                  
              
          </div>
        </div>
      </div>
    </section>

 <?php include '../include/footer.php' ?>
   