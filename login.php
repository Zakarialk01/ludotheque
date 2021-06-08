<?php


      include_once 'connexion.php';
    
   

      if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else  {
      if(isset($_POST['btn-save'])){
    
        $Name=$_POST['Name'];
        $Password=$_POST['Password'];
        
     
        if(empty($Name) || empty($Password)){
          echo "vous devez remplir les champs , merci !";
        }
        $Pass = md5($Password);
        $query= mysqli_query($conn, "Select * FROM users where Uname='$Name' and Password='$Pass' ");
        
           
        $row= mysqli_num_rows($query);
        if($row){
            header("Location : http://localhost/ludotheque/acceuil.php",true,301);
            exit();
        }
        else{
          echo "identifiant ou mot de passe incorrect";
          exit();
          }
          mysqli_close($conn);  
            
    }
}
?>



<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="login.css">

</head>
<style>
.login{
  background-color: rgb(45, 55, 114);
}

</style>
<body>
<a href="home.html"> <button class="btn"> <-- </button>  </a>
<form class="login" method="POST" action=""  >
  
        <img
         class="img"
          src="https://jeuxvousaime.pagesperso-orange.fr/Fonctionnement_files/ludotheque_logo.png"
        />
      
          <div>
            <h1 >
             
              <i class="fa fa-fw fa-user"></i>Login
            </h1>
           
 
          
           

        <label>
        Nom :
          <input
            type="text"
            id="Name"
            name="Name"
            placeholder="Entrez votre Nom"
            
          />
          <p></p>
        </label>
        <label>
        Mot de passe:
          <input
            type="password"
          name="Password"
            id="password"
            placeholder="Entrez votre mot de passe"
           
          />
          <label style="font-weight:500" >Pas encore inscrit , <span s><a style="text-decoration:none;color:yellow" href="inscription.html">Inscrivez vous</a></span></label>
        </label>
        
 <input  type="submit" class="bouton" name="btn-save" value="Connexion" />
         
          <div>
        
          
        </div>
   
          
          
        
        
      </form>
</body>
</html>