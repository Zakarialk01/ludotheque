<?php 
      include_once 'connexion.php';
    
   

      if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else  {
      if(isset($_POST['Name'])){
    
        $uname=$_POST['Name'];
        $password=$_POST['Password'];
        
        $sql=
        "SELECT * FROM `login`";
        
        $result=mysqli_query($conn,$sql);
        
        if($result){
            header("Location : http://localhost/ludotheque/admin.php",true,301);;
            exit();
        }
        else{
            echo " You Have Entered Incorrect Password";
            exit();
        }
            
    }
}