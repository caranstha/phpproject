<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}


$id=$_GET['id'];


if(isset($_POST['submit']))
  {
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    
    if($_FILES['image']['name']=='')
    {
      $result=$obj->getproduct($id);
     if($result->num_rows>0)
        {
     while ($row=$result->fetch_assoc()) {
        $file=$row['pimage'];
                          
    }
  }
  }
  else{

    $file=$_FILES['image']['name'];
  }
    
    $temp_location=$_FILES['image']['tmp_name'];
    $_destination="../uploads/";
    move_uploaded_file($temp_location, $_destination.$file);
    $res=$obj->updateprofile($id,$fullname,$email,$file);

    if($res)
    {
      header('location:index.php');

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
    <title>Admin Area | Edit Profile</title>
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
                <h3 class="panel-title">Edit Profile</h3>
              </div>

              <?php 
                      $result=$obj->getuserdetails($id);

                      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          ?>
            <form id="login" action="" class="well" method="POST" enctype = "multipart/form-data">

                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control"  name="fullname" title="Enter your Product Name" required value="<?php echo $row['fullname'];?>">
                  </div>

                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $row['email'];?>">
                  </div>


                  <div class="form-group" class="file btn btn-lg btn-primary">
                    <label>Product Image</label>
                    <input type="file" class="form-control"  name="image"  value="<?php echo $row['userimage'];?>"><?php echo $row['userimage'];?>
                    <img src="../uploads/<?php echo $row['userimage'];?>" class="img-responsive img-rounded" width="60px" height="40px" >
                  </div>



                  <button type="submit" name="submit" onClick="Validate()" class="btn btn-primary btn-block">Update Profile</button>
              </form>
              <?php } } ?>
          </div>
        </div>

      
                  
              
          </div>
        </div>
      </div>
    </section>


    <?php include '../include/footer.php' ?>