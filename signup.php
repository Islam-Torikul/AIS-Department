<?php 
include_once 'resource/Database.php' ;
include_once 'resource/utilities.php';

if(isset($_POST['submit'])){
    $form_errors=array();
    $required_fields=array('email','username','password');
    $form_errors=array_merge($form_errors,cheak_empty_fields($required_fields));
    $fields_to_cheak_length=array('username'=>4,'password'=>6);
    $ck=0;
    $form_errors=array_merge($form_errors,cheak_min_length($fields_to_cheak_length));
    $form_errors=array_merge($form_errors,cheak_email($_POST));
    
    if(empty($form_errors)){
      
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password']; 
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
     if($ck==0){
     $sql="SELECT * From users where username=:username";
     $query=$db->prepare($sql);
     $query->execute(array(':username'=>$username));
     if($query->fetch()>0)
     {
         $ck=1;
      }
     
        else
        {
            $ck=0;
        }
     }
    if($ck==0){
     try{
     $sql="INSERT INTO users(username,password, email,join_date) VALUES(:username,:password,:email,now())";
     $query=$db->prepare($sql);
     $query->execute(array(':username'=>$username,':password'=>$hashed_password,':email'=>$email));
     if($query->rowCount()==1)
    {
        $result="<script type='text/javascript'>alert('Registation successfull!')</script>";
    }
        
  }
    catch(PEOException $e)
  {
    echo "Registation faild",$e->getMessage();
  }
}
else
{
    echo "<script type='text/javascript'>alert('Username Already Exits')</script>";
}
 
}
else{
    if(count($form_errors)==1){
        
        $result="<div class='alert alert-warning alert-dismissible fade show' style='max-width:500px;margin:10px auto'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>";
        foreach($form_errors as $error)
        {
            $result.="<strong>Warning!</strong> {$error}";
         }
        $result.="</div>";
        
        
       
    }
    else
    {
         
         $result="<div class='alert alert-warning alert-dismissible fade show' style='max-width:500px;margin:10px auto'><button type='button' class='close' data-dismiss='alert'>&times;</button>";
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
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link rel="stylesheet" href="inc/bootstrap.min.css">
        <script src="inc/jquery.min.js"></script>
        <script src="inc/popper.min.js"> </script>
        <script src="inc/bootstrap.min.js"></script>
    </head>
    <body>
<?php include 'header.php';?>
<br>
<div class="container">
    <h3 class='text-primary' style="text-align:center">Registation</h3><br>

  <?php 
    if(isset($result))
    echo $result;
    ?>
    
    
  <div style="max-width:500px;margin:10px auto">   
  <form action="" method="post">
      <div class="input-group mb-3 ">
          <div class="input-group-prepend">
             <span class="input-group-text text-info">Email</span>
          </div>
            <input type="text" class="form-control text-info" name="email" placeholder="Enter Email">
     </div>
  <div class="input-group mb-3 ">
      <div class="input-group-prepend">
         <span class="input-group-text text-info">username</span>
      </div>
     <input type="text" class="form-control text-info" name="username" placeholder="Enter Username">
  </div>
  <div class="input-group mb-3">
      <div class="input-group-prepend">
         <span class="input-group-text text-info">Password</span>
      </div>
     <input type="password" class="form-control text-info" name="password" placeholder="Enter Your Password" style="width:170px;">
  </div>
  <button type="submit" class="btn btn-outline-primary" name="submit" >Register</button>
</form>
</div>
 </div>
<br>
<br>

    
 </body>
</html>