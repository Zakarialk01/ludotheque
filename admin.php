<?php

session_start();
$conn = new mysqli('localhost','root','','react');
if(isset($_POST['upload'])){


if(!empty($_FILES['image']['tmp_name']) 
     && file_exists($_FILES['image']['tmp_name'])) {
    $file=  addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $filetmpname=$_FILES['image']['tmp_name'];
  
    $folder='img/';
  
    move_uploaded_file($_FILES['image']['tmp_name'], $filetmpname);

     }
    
    
  
  $Nom=$_POST['Nom'];
  $Type=$_POST['Type'];
  $Resume=$_POST['Resume'];
  $Age=$_POST['Age'];
  if(empty($Nom) || empty($Type)|| empty($Age)|| empty($Resume)){
    echo "vous devez remplir les champs , merci !";
  }


$query="INSERT INTO `games`( `Name`, `Age`, `Type`, `Abstract`, `Image`) VALUES ('$Nom','$Age','$Type','$Resume','$file')";

$query_run= mysqli_query($conn,$query);
if($query_run){
  
  echo "<script>alert(\" +Ajout avec succés \")</script>";


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
  <title>Ajouter jeu</title>
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
          <a href="supprimerJeu.php"> <i class="fa fa-minus"></i> Supprimer Jeu  </a>
          <a href="ModifierJeu.php"><i  class="fa fa-refresh"></i> Modifier Jeu  </a>
        <a href="jeuAdmin.php"> <i class="fa fa-play-circle" style="color:white"></i> Jeux Dans le site   </a>
   
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
                <form method="POST" action="" enctype="multipart/form-data" >

                <label> entrez la photo du jeu </label>
                <br/>
                <input class="input" style="color:black;" type="file" name="image" id="image"/> 
               
                
                <label >Age </label>
                  <input
                    class="input"
                    type="number"
                    min="0"
                    max="50"
                    id="Age"
                    name="Age"
                    placeholder="Age pour enfant ?"
                   
                  />
                  <br/>
                  <label for="fname">Nom du jeu </label>
                  <input
                    class="input"
                    type="text"
                    id="Nom"
                    name="Nom"
                    placeholder="Nom du jeu"
                   
                  />
                  <label for="country">Type du jeu</label>
                  <input
                    class="input"
                    type="text"
                    name=Type
                    id="Type"
                    placeholder="Genre   "
                   
                  />

          
                  <label for="subject">Resume du jeu :</label>
                  <textarea  
                  style="height: 170px"
                    class="textarea"
                    id="Resume"
                    name="Resume"
                    placeholder="resume du jeu ..."
           
                   
                  ></textarea>
                  <button
                  id="ajouter"
                    class="button"
                    type="submit"
                    name="upload"
                    value="Ajouter un jeu"
                    disabled
                  >
                  Ajouter un jeu
                  </button>
                </form>
              </div>
            </div>
          </div>
</body>
</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/
jquery.min.js"></script>
<script type="text/javascript">
  $("#image").keyup(function(event) {
        validateInputs();
    });
 
    $("#Age").keyup(function(event) {
        validateInputs();
    });
 
    $("#Type").keyup(function(event) {
        validateInputs();
    });
 
    $("#Resume").keyup(function(event) {
        validateInputs();
    });
 
    $("#Nom").keyup(function(event) {
        validateInputs();
    });
 
    function validateInputs(){
        var disableButton = false;
 var image= $("#image").val();
        var Age = $("#Age").val();
        var Nom = $("#Nom").val();
        var Type = $("#Type").val();
        var Resume = $("#Resume").val();
 
        if(Age.length == 0 || Nom.length == 0 || Type.length == 0 || Resume.length == 0||image.length==0)
            disableButton = true;
 
        $('#ajouter').attr('disabled', disableButton);
    }
</script>