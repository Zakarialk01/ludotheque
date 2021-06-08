<?php 
      include_once 'connexion.php';
    
   $invalid="";

      if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else  {
      if(isset($_POST['btn-save'])){
          if(empty($_POST['Name'] || $_POST['Password'] )){
            echo "vous devez remplir les champs , merci !";
          }
    
        $uname=$_POST['Name'];
        $password=$_POST['Password'];
        
      
        $query= mysqli_query($conn, "Select * FROM login where Name='$uname' AND Password='$password'");
       
        $row= mysqli_num_rows($query);
        
        if($row==1){
            header("Location : http://localhost/ludotheque/admin.php",true,301);
            exit();
        }
        else {
            echo "identifiant ou mot de passe incorrect";
            exit();
            }
            mysqli_close($conn);   
    }
}

?>