<?php
$dsn='mysql:host=localhost;dbname=register';
$username='root';
$password='';
try{
    $db=new PDO($dsn,$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "connect to database";
}
catch(PEOException $e)
{
    echo "Connection faild",$e->getMessage();
}
?>