<?php

include 'connexion.php';
if(isset($_POST['delete'])){
    $select = isset($_POST['select']) ? $_POST['select'] : NULL;

$query="DELETE FROM `games` where Name='$select'";
$query_run = mysqli_query($conn,$query);
if($query_run){
  echo "<script>alert(\" Suppression avec succés \")</script>";


}
else {
  echo '<script type="text/javascript"> alert("erreur dans lenvoi") </script> ';

} 
}
?>


<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Supprimer jeu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin.css">

</head>
<body>
  

<div class="nav2">
        <input type="checkbox" id="nav-check" />
        <div class="nav-header">
          <div class="nav-title">
          Welcome Admin
            <i class="fa fa-fw fa-user"></i>
          </div>
        </div>
        <div class="nav-btn">
          <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>

        <div class="nav-links">
        <a href="admin.php" >  <i class="fa fa-plus" style="color:white"></i> Ajouter Jeu   </a>
        <a href="supprimerJeu.php"> <i class="fa fa-minus"></i> Supprimer Jeu  </a>
     
    
    <a href="jeuAdmin.php"> <i class="fa fa-play-circle" style="color:white"></i> Jeux Dans le site   </a>
    <a href="ModifierJeu.php"><i  class="fa fa-refresh"></i> Modifier Jeu  </a>
    <a href="jeuReserve.php"> <i class="fa fa-fw fa-ticket" style="color:white"></i> Jeux reservé   </a>
    <a href="contactFormAdmin.php"> <i class="fa fa-commenting-o" style="color:white"></i> Formlaire de contact   </a>
      

          <button class="btn"  name="btn" >
            <i class="fa fa-sign-out" ></i>  <a style="color:white;text-decoration:none" href = "logoutAdmin.php">  Log out</a>
          </button>
        </div>
      </div>
    </div>

    <div class="container1" id="contact">
            
            <div class="row3 ">
              <div class="column2">
                <div class="card2">
                  <div class="flex">
                    <img class="image" src="img/avatar.png" />
                  </div>
                </div>
              </div>
              <br/>
              
             
              <div class="column2">
             
                <form method="POST" action="" >

              <div style="margin-top:35%">
                  <label for="country">Selectionnez le jeu que vous voulez supprimer :</label>
                  <select  class="select" name="select">
     <?php
     include 'connexion.php';
  
     $sql="SELECT `Name` FROM games";
     $result = $conn->query($sql);
     if($result->num_rows>0){
	
      while($row=$result->fetch_assoc()){
     
    ?>
      <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
    <?php
     }
    }

    ?>
    

</select>


          
                 
                  <button
                    class="button"
                    type="submit"
                    name="delete"
                    value="Ajouter un jeu"
               
                  >
              Supprimer le jeu
                  </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
</body>
</html>