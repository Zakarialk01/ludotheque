<?php
include_once 'connexion.php';
session_start();

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else  {
    if(isset($_POST['btn-save'])){
      $UserName=mysqli_real_escape_string($conn,$_POST['UserName']);
        $Email=mysqli_real_escape_string($conn,$_POST['Email']);
      $Password=mysqli_real_escape_string($conn,$_POST['Password']) ;
	
               if(empty($UserName) || empty($Email) || empty ($Password)){
                  echo ' Please Fill in the blanks ';
                  }
                 else {
                  $Pass = md5($Password);
                  $sql="insert into users (UName,Email,Password) values('$UserName','$Email','$Pass')";
                  $result=mysqli_query($conn,$sql);
             if($result){
              header("Location : http://localhost/ludotheque/acceuil.php",true,301);
              exit();
                 }
              else {
                  echo ' check your query';
              }

  }
}
    }
?>
