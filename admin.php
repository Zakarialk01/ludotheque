<?php

session_start();
$conn = new mysqli('localhost','root','','react');
if(isset($_POST['upload'])){


if(!empty($_FILES['image']['tmp_name']) 
     && file_exists($_FILES['image']['tmp_name'])) {
    $file=  addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $handle      = fopen( $tmpImageName, 'r' );
    $content = fread( $handle, filesize( $file ) );
    fclose($handle);
   
}


  
  $Nom=$_POST['Nom'];
  $Type=$_POST['Type'];
  $Resume=$_POST['Resume'];
  $Age=$_POST['Age'];
  


$query="INSERT INTO `games`( `Name`, `Age`, `Type`, `Abstract`, `Image`) VALUES ('$Nom','$Age','$Type','$Resume','.mysql_escape_string(content).')";

$query_run= mysqli_query($conn,$query);
if($query_run){
  
  echo '<script type="text/javascript"> alert("votre formulaire a été 
  envoyé sucessivement") </script> ';


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
  <title>Titre de la page</title>
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
        <a href="admin.php" >  <i class="fa fa-fw fa-home" style="color:white"></i> Ajouter Jeu   </a>
          <a href="supprimer.php"> <i class="fa fa-fw fa-ticket" style="color:white"></i> Supprimer Jeu  </a>
        <a href="jeuAdmin.php"> <i class="fa fa-play-circle" style="color:white"></i> Jeux Dans le site   </a>
      

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
                    <img class="image" src="avatar.png" />
                  </div>
                </div>
              </div>
              <div class="column2">
                <form method="POST" action="" >

                <label> entrez la photo du jeu </label>
                <br/>
                <input style="color:black;  " type="file" name="image" /> 
               <br/>
                <br/>
                
                <label >Age </label>
                  <input
                    class="input"
                    type="number"
                    min="0"
                    max="50"
                    id="fname"
                    name="Age"
                    placeholder="Age pour enfant ?"
                   
                  />
                  <br/>
                  <label for="fname">Nom du jeu </label>
                  <input
                    class="input"
                    type="text"
                    id="fname"
                    name="Nom"
                    placeholder="Nom du jeu"
                   
                  />
                  <label for="country">Type du jeu</label>
                  <input
                    class="input"
                    type="text"
                    name=Type
                    placeholder="Genre   "
                   
                  />

          
                  <label for="subject">Resume du jeu :</label>
                  <textarea  
                  style="height: 170px"
                    class="textarea"
                    id="subject"
                    name="Resume"
                    placeholder="resume du jeu ..."
           
                   
                  ></textarea>
                  <button
                    class="button"
                    type="submit"
                    name="upload"
                    value="Ajouter un jeu"
               
                  >
                    Envoyer
                  </button>
                </form>
              </div>
            </div>
          </div>
</body>
</html>