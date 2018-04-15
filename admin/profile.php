<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

           <?php include 'include/header.php' ?>

   

    <section id="main">
      <div class="container">
        
          
              <div class="row">

                <?php include 'include/sidebar.php' ?>


          
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Your Profile</h3>
              </div>
              <div class="panel-body">
                <div class=" profile">

    <div class="profile-bottom">
      <h3><i class="fa fa-user"></i>Profile</h3>
      <div class="profile-bottom-top">
      <div class="col-md-4 profile-bottom-img">
        <img src="images/pr.jpg" alt="">
      </div>
      <div class="col-md-8 profile-text">
        <h6>Jack Dorsey</h6>
        <table>
        <tr><td>Department</td>  
        <td>:</td>  
        <td>Web Designer</td></tr>
        
        <tr>
        <td>Email</td>
        <td> :</td>
        <td><a href="info@gmail.com">info@lorem.com</a></td>
        </tr>
        <tr>
        <td>Skills</td>
        <td> :</td>
        <td> HTML, CSS,Jqury, Bootstrap</td>
        </tr>
        <tr>
        <td>Country </td>
        <td>:</td>
        <td> United Arab Emirates</td>
        </tr>
        </table>
      </div>
      <div class="clearfix"></div>
      </div>
      <div class="profile-bottom-bottom">
      <div class="col-md-4 profile-fo">
        <h4>23,5k</h4>
        <p>Followers</p>
        <a href="#" class="pro"><i class="fa fa-plus-circle"></i>Follow</a>
      </div>
      <div class="col-md-4 profile-fo">
        <h4>348</h4>
        <p>Following</p>
        <a href="#" class="pro1"><i class="fa fa-user"></i>View Profile</a>
      </div>
      <div class="col-md-4 profile-fo">
        <h4>23,5k</h4>
        <p>Snippets</p>
        <a href="#"><i class="fa fa-cog"></i>Options</a>
      </div>
      <div class="clearfix"></div>
      </div>
      <div class="profile-btn">

                <button type="button" href="#" class="btn bg-red">Save changes</button>
           <div class="clearfix"></div>
      </div>
       
      
    </div>
  </div>

                
                
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
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
