<?php

include 'connexion.php';
if(isset($_POST['update'])){
    $select = isset($_POST['select']) ? $_POST['select'] : NULL;
    $Name = isset($_POST['Name']) ? $_POST['Name'] : NULL;
    $Age = isset($_POST['Age']) ? $_POST['Age'] : NULL;
    $Type = isset($_POST['Type']) ? $_POST['Type'] : NULL;
    $Resume = isset($_POST['Resume']) ? $_POST['Resume'] : NULL;

    $query="UPDATE `games` SET `Name` ='$Name',`Age`='$Age',`Type`='$Type',`Abstract`='$Resume' WHERE `Name`='$select'";
  
$query_run = mysqli_query($conn,$query);
if($query_run){

  echo "<script>alert(\" Modification avec succés \")</script>";


}
else {
  echo '<script type="text/javascript"> alert("erreur dans lenvoi") </script> ';

} 
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
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
          <a href="supprimerJeu.php"> <i class="fa fa-fw fa-ticket" style="color:white"></i> Supprimer Jeu  </a>
        
        <a href="jeuAdmin.php"> <i class="fa fa-play-circle" style="color:white"></i> Jeux Dans le site   </a>
       
        <a href="jeuReserve.php"> <i class="fa fa-play-circle" style="color:white"></i> Jeux reservé   </a>
        <a href="contactFormAdmin.php"> <i class="fa fa-play-circle" style="color:white"></i> Formlaire de contact   </a>
      

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

                <label for="country">Selectionnez le jeu que vous voulez modifier :</label>
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

                <label for="fname">Nom du jeu </label>
                  <input
                    class="input"
                    type="text"
                    id="Nom"
                    name="Name"
                    placeholder="Nom du jeu"
                   
                  />
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
                 
                  <label for="country">Type du jeu</label>
                  <input
                    class="input"
                    type="text"
                    id="Type"
                    name=Type
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
                    class="button"
                    type="submit"
                    name="update"
                    id="modifier"
                    value="Ajouter un jeu"
               disabled
                  >
                 Modifer Jeu
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
 
        var Age = $("#Age").val();
        var Nom = $("#Nom").val();
        var Type = $("#Type").val();
        var Resume = $("#Resume").val();
 
        if(Age.length == 0 || Nom.length == 0 || Type.length == 0 || Resume.length == 0)
            disableButton = true;
 
        $('#modifier').attr('disabled', disableButton);
    }
</script>