<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="collapse navbar-collapse">



          <ul class="nav navbar-nav">
            <?php $result=$obj->showcategory();
      if($result->num_rows>0)
                      {
                        while ($row=$result->fetch_assoc()) {
                          

                      ?>
        
            <li><a href="category.php?category=<?php echo $row['id'];?>"><?php echo $row['categoryname']?></a></li>
           <?php }} ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Welcome </a></li> 
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="logo" aria-hidden="true"></span> <a href="index.php"><img src="../uploads/logo.png"></a></h1>
          </div>
          <!-- <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </header>