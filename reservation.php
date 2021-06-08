<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta charset="UTF-8">
  <title>Jeu</title>
  <link rel="stylesheet" href="jeu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
</head>
<style>
    

table{
border-collapse:collapse;
width:100%;
color:darkcyan;
font-family:monospace;
font-size:25px;
margin-top:5%;

text-align:left;
}
th{
background-color:darkcyan;
color:white;
}
@media (max-width: 700px){
table thead {
display: none;
}
table tr{
display: block;
margin-bottom: 40px;
}
table td {
display: block;
text-align: right;
}
table td:before {
content: attr(data-label);
float: left;
font-weight: bold;
}
}
</style>

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
        <a href="reservation.php" >   <i class="fa fa-fw fa-search" style="color:white"> </i> Mes Reservations  </a>


          <button class="btn"  name="btn" >
          <i class="fa fa-sign-out" ></i>  <a style="color:white;text-decoration:none" href = "logout.php">  Log out</a>
          </button>
        </div>
      </div>
      <br>
<h1 style="color:rgb(45, 55, 114); text-align : center">Reservation récentes :</h1>
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
    
</table>

</body>
</html>