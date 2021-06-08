
<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jeux réservés</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin.css">
  
  


</head>
<style>
    


    .flex {
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
  flex-wrap: wrap;
}
.movie {
  width: 250px;
  background: darkcyan;
  overflow: hidden;
  justify-content: space-around;
  border-radius: 3px;
  box-shadow: whitesmoke;
  position: relative;
  margin: 1rem;
}
.movie img {
  width: 250px;

  height: 210px;
}
.movie-info {
  display: flex;
  color: white;
  justify-content: space-between;
  padding: 1rem;

  align-items: center;
}
.movie-info h3 {
  margin: 0;
}
.movie-info span {
  font-weight: 700;
  padding: 5px;
  background: rgb(16, 21, 55);
}

.movie-overview {
  position: absolute;
  bottom: 0;
  left: 0;
  color: white;
  right: 0;
  background: darkcyan;
  font-weight: 600;
  line-height: 2;
  padding: 1rem;
  transform: translateY(100%);
  transition: transform 0.7s ease-in-out;
  overflow: auto;
  height: 100%;
}
.movie:hover .movie-overview {
  transform: translateY(0%);
}
.h2 {
  margin: 10px;
  text-align: center;
  color: white;
}
.overview-flex {
  display: flex;
  justify-content: space-between;
}
</style>
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
<br>
<h1 style="color:darkcyan; text-align : center"> Historique des réservation :</h1>
<div class="flex">
      <?php
      include 'connexion.php';
     
      
      
        
        $sql = "SELECT * FROM `booking` ";
      
      
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
           
     
        while($row = $result->fetch_assoc()) {
       ?>
       
       <div >
            <div class="movie" >
           

          <?php  echo '<img src="data:image;base64,'.base64_encode($row['ImageClient']).'" alt="image"  >';?>
            <div class="movie-info">
          
            
         
            <strong><?php echo utf8_encode($row['Game_Name']); ?></strong>
                      </div>
                      <div class="movie-overview">
                        <h2>Details</h2>
                       
                        <p><?php  echo utf8_encode ($row['Email']); ?></p>
                        <p><?php  echo utf8_encode ($row['Name']); ?></p>
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