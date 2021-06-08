<?php
include 'process.php';





?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="jeu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
</head>

<body>
<div >

      <div class="nav2">
        <input type="checkbox" id="nav-check" />
        <div class="nav-header">
          <div class="nav-title">
         Welcome <?php echo (isset($_SESSION['UserName']) ? $_SESSION['UserName'] : "Visitor");
 ?>

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
        <a href="acceuil.php" > <i class="fa fa-fw fa-home" style="color:white"></i> Acceuil   </a>
          <a href="reserverJeu.php"> <i class="fa fa-fw fa-ticket" style="color:white"> </i> Reserver  </a>
 
        <a href="jeu.php" >   <i class="fa fa-fw fa-search" style="color:white"> </i> Recherche  </a>



          <button class="btn"  name="btn" >
          <i class="fa fa-sign-out" ></i>  <a style="color:white;text-decoration:none" href = "logout.php">  Log out</a>
          </button>
        </div>
      </div>
      <br/>
      <br/>
      <div class="flex">
      <?php
      include_once 'connexion.php';
      
      
      
        $sql = "SELECT * FROM `games`";
      
      
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
           
        // output data of each row
        while($row = $result->fetch_assoc()) {
       ?>
       
           
       
            <div >
            <div class="movie" >
           

          <?php  echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt="image"  >';?>
            <div class="movie-info">
            <h3><?php echo utf8_encode($row['Name']); ?></h3>
            
            <span><?php echo  $row['Age']; ?></span>
            <strong><?php echo utf8_encode($row['Type']); ?></strong>
                      </div>
                      <div class="movie-overview">
                        <h2>Details</h2>
                       
                        <p><?php  echo utf8_encode ($row['Abstract']); ?></p>
                        <button class="btn2">Reservez</button>
                      </div>
                    </div>
        </div>
          
      
      
      <?php
        }
      
      } else {
        echo "no results";
      
      
      }
      ?>

    </div>
    


  
</body>
</html>