
<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}
?>



<script src="include/ckeditor/ckeditor.js"></script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Add Product</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>


           <?php include '../include/header.php' ?>

  
                <?php include '../include/sidebar.php' ?>

                
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Your Profile</h3>
              </div>

               <?php  

       $uid = $_SESSION['id'];
        $result=$obj->getuserdetails($uid);
        if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
       ?>
              <div>
                Hello <?php echo $row['username'];?>
              </div>
         
              <div class="panel-body">
                <div class=" profile">

    <div class="profile-bottom">
      <h3><i class="fa fa-user"><a class="btn btn-default glyphicon glyphicon-pencil" href="editprofile.php?id=<?php echo $row['id']?>"></a></i>Profile</h3>
      <div class="profile-bottom-top"> 
      <div class="col-md-4 profile-bottom-img">
        <img src="../uploads/<?php  echo $row['userimage']; ?>" class="img-responsive img-circle" width="100%" height="100%" > 
      </div>
      <div class="col-md-8 profile-text">
        <h6><?php echo $row['fullname'];?></h6>
        <table>
        <tr><td>Role</td>  
        <td>:</td>  
        <td><?php echo $row['role']?></td></tr>
        
        <tr>
        <td>Email</td>
        <td> :</td>
        <td><a href="<?php echo $row['email'];?>"><?php echo $row['email'];?></a></td>
        </tr>
        
        </table>
      </div>
      <div class="clearfix"></div>
      </div>
       <?php } }?>
       
      
    </div>
  </div>

                
                
              </div>
              </div>

             
              
          </div>
        </div>
      </div>
    </section>


                 <?php include '../include/footer.php' ?>
      


    

    
   

    