  <?php 
    class User{
    public $host="localhost";
    public $username="root";
    public $password="";
    public $db="project";
    public $con;
    public function __construct()
    {
      $this->con=new mysqli($this->host,$this->username,$this->password,$this->db);
            //mysqli_connect($this->host,$this->username,$this->password,$this->db);
    }

    public function register($fullname,$username,$email,$password,$role)
    {  
      $sql="INSERT into admin(fullname,username,email,password,role) values('$fullname','$username','$email','$password','$role')";
      return $this->con->query($sql);
    }


     public function checklogin($username,$password)
    { 
      $user=$username;    
      $pass=md5($password);  
      
      $sql1="SELECT * FROM `admin` WHERE username='$user' AND password='$pass' ";
      
       return $this->con->query($sql1);

    }


  public function getsession()
  {
    return $_SESSION['login'];
  }
    

    public function addcategory($categoryname)
    {
      $sql="INSERT into category(categoryname) values('$categoryname')";

      return $this->con->query($sql);

    }




  public function showcategory()
  {
  $sql="SELECT * from category";

  return $this->con->query($sql);

  }

  public function findcategory($id)
  {

  $sql="select categoryname,id from category where id='$id'";
  return $this->con->query($sql);
  

  }


  public function deletecategory($id)
  {
   $sql="DELETE FROM category WHERE id = '$id'";
   return $this->con->query($sql);
  }
   




  public function getuserdetails($id)
  {

    $sql="select * from admin where id='$id'";
    return $this->con->query($sql);
  }

  public function getusers()
  {

    $sql= "select * from admin";
    return $this->con->query($sql);
  }

public function deleteuser($id)
{

   $sql="DELETE FROM admin WHERE id = '$id'";
   return $this->con->query($sql);
}

public function getrole($id)
{
  $sql="select admin.role from admin where id='$id'";
   return $this->con->query($sql);
  
}

public function updaterole($id,$role)
{


  $sql="Update admin set role='$role' where id=$id";

return $this->con->query($sql);

}

public function updateprofile($id,$fullname,$email,$file)
{
 $sql="Update admin set fullname='$fullname',email='$email',userimage='$file' where id=$id";
  return $this->con->query($sql);

}




  public function addproduct($pname,$pid,$pdesc,$pcategory,$pprice,$pimage)
  {


     $sql="INSERT into product(pid,pname,pdesc,pprice,pcategory,pimage) 
     values('$pid','$pname','$pdesc','$pprice','$pcategory','$pimage')";

     return $this->con->query($sql);

  }

  public function showproduct()
  {

  $sql="SELECT * from product";
  return $this->con->query($sql);
  }


  public function getproduct($id)
  {
  
  $sql="SELECT * from product where id='$id'";
  return $this->con->query($sql);

  }

  public function updateproduct($id,$pname,$pid,$pdesc,$pcategory,$pprice,$pimage)
  {

     
     $sql="Update product set pname='$pname',pid='$pid',pdesc='$pdesc',pcategory='$pcategory' ,pprice='$pprice' ,pimage='$pimage' where id=$id";

    return $this->con->query($sql);

  }


  public function deleteproduct($id)
  {
    
   $sql="DELETE FROM product WHERE id = '$id'";
   return $this->con->query($sql);
  }


public function addsliderimage($quotation,$file)
{

 $sql="INSERT into slider(quotation,sliderimage) values('$quotation','$file')";

     return $this->con->query($sql);


}

public function showslideriamge()
{
  $sql="SELECT * from slider";
  return $this->con->query($sql);
}

public function deleteslider($id)
{
   $sql="DELETE FROM slider WHERE id = '$id'";
   return $this->con->query($sql);
}



public function categoryproduct($id)
{
$sql="select * from product where pcategory='$id'";
   return $this->con->query($sql);
  

}



  public function logout()
  {         
            $_SESSION['login'] = FALSE;
            session_destroy();


  }
        

  }

  ?>