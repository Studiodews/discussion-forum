<?php
include'dbconfig.php';

/**
 *login to forum if username and password match
 * @param string username
 * @param string password
 * */
 
 function signin($username,$password)
 {
    Global $error;
    $username=mysql_real_escape_string($username);
    $password=mysql_real_escape_string($password);
    
    //calculate md5 hash for password
    $password=md5($password);
    
    $sql="SELECT * FROM fusers WHERE userName ='$username' AND password='$password'";
    
    $result=mysql_query($sql)or die("query failed ".mysql_error());
    if(mysql_num_rows($result)==1)
    {
        $_SESSION['athorized']=true;
        $row=mysql_fetch_assoc($result);
        $_SESSION['userID']=$row->userID;
        header("location:../");
        exit();
    }
    else
    {
        $error[]="wrong username or password";
        //echo"wrong username or password";
    }
 }
 
 //signin("admin","admin"); 
 
 /**
  * check if user signed in or not
  * @return boolean true if signed or false
  * */
   
  function isSignedIn()
  {
    if(isset($_SESSION['athorized']))
    {
        return true;
    }
    else
    {
        return false;
    }
  } 
  
  /**
   * log out from the forum 
   * */
   function logout()
   {
     if(isset($_SESSION['athorized']))
    {
        unset($_SESSION['athorized']);
    }
   }
  

?>