<?php 
include_once 'resource/Database.php' ;
include_once 'resource/utilities.php';
include_once 'resource/session.php';
if(isset($_POST['submit']))
{
    $form_errors=array();
    $required_fields=array('username','password');
    $form_errors=array_merge($form_errors,cheak_empty_fields($required_fields));
     if(empty($form_errors)){
         $username=$_POST['username'];
         $password=$_POST['password'];
         $sql="SELECT * From users where username=:username or email=:username ";
         $query=$db->prepare($sql);
         $query->execute(array(':username'=>$username));
         while($row=$query->fetch()){
             $id=$row['id'];
             $pass=$row['password'];
             $user=$row['username'];
             $_SESSION['id']=$row['id']; 
             $_SESSION['email']=$row['email'];
             $_SESSION['username']=$row['username'];
                 
             if(password_verify ($password,$pass)){
                 
                 
                 header("location:home.php");
             }
             else
             {
                 echo "<script type='text/javascript'>alert('Username & Password is invalid!!')</script>";
             }
         }
        
     }
    else
    {
         if(count($form_errors)==1){
         $result="<div class='alert alert-warning alert-dismissible fade show' style='max-width:500px;margin:10px auto'>
       <button type='button' class='close' data-dismiss='alert'>&times;</button>";
        foreach($form_errors as $error)
        {
            $result.="<strong>Warning!</strong> {$error}<br>";
         }
        $result.="</div>";
    }
    else
    {
        $result="<div class='alert alert-warning alert-dismissible fade show' style='max-width:500px;margin:10px auto'>
       <button type='button' class='close' data-dismiss='alert'>&times;</button>";
        foreach($form_errors as $error)
        {
            $result.="<strong>Warning!</strong> {$error}<br>";
         }
        $result.="</div>";
        
        
    }
    }
}
?>
<html>
    <head>
        
        <link rel="stylesheet" href="inc/bootstrap.min.css">
        <script src="inc/jquery.min.js"></script>
        <script src="inc/popper.min.js"> </script>
        <script src="inc/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include 'header.php'; ?>
        <br>
    <div class="container">
    <h3 class='text-primary' style="text-align:center">Login</h3><br>
        <?php 
    if(isset($result))
    echo $result;
    ?>

  <div style="max-width:500px;margin:10px auto">   
  <form action="" method="post">
  <div class="input-group mb-3 ">
      <div class="input-group-prepend">
        <span class="input-group-text text-info">username / Email</span>
      </div>
    <input type="text" class="form-control text-info" name="username" placeholder="Enter Username Or Email">
  </div>
  <div class="input-group mb-3">
       <div class="input-group-prepend">
        <span class="input-group-text text-info">Password</span>
       </div>
     <input type="password" class="form-control text-info" name="password" placeholder="Enter Your Password" style="width:170px;">
  </div>
  <button type="submit" class="btn btn-outline-primary" name="submit" >Submit</button>
  <button type="submit" class="btn btn-outline-primary" name="forgetpassword" style="margin-left:50px"><a href="forget.php" id="link">Forget Password</a></button>
      <div class="input-group mb-3"></div>
      <p>Not A Member!!  <a href="signup.php">Click Here</a></p>
</form>  
        
</div>
</div>
<br>
<br>
    
 </body>
</html>