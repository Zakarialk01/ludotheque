
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
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
        <a href="acceuil.php" >  <i class="fa fa-fw fa-home" style="color:white"></i> Acceuil   </a>
          <a> <i class="fa fa-fw fa-ticket" style="color:white"></i>Reserver  </a>
        <a to="Jeux"> <i class="fa fa-play-circle" style="color:white"></i>Jeux   </a>
        <a href="jeu.php" >   <i class="fa fa-fw fa-search" style="color:white"></i> Recherche  </a>


          <button class="btn"  name="btn" >
            <i class="fa fa-sign-out" ></i>  <a style="color:white;text-decoration:none" href = "logout.php">  Log out</a>
          </button>
        </div>
      </div>
    </div>
    <br>
    <h1 style="text-align:center;color:#48149b"><i class="fa fa-search"></i> FILTRES :</h1>
</br>

    
    <div style="display:flex">

    <form class="example"  action="jeu.php" style="margin:auto;max-width:300px"  method="get">
    <input  type="text" name="search" placeholder="Chercher par Type" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
    <button  type="submit"><i class="fa fa-search"></i></button><br><br>
 
      </form>
     
      <form class="example"  action="jeu.php" style="margin:auto;max-width:300px"  method="get">
    <input  type="text" name="search2" placeholder="Chercher par Age" required value="<?php if(isset($_GET['search2'])){echo $_GET['search2']; } ?>">
    <button  type="submit"><i class="fa fa-search"></i></button><br><br>
 
      </form>
      <form class="example"  action="jeu.php" style="margin:auto;max-width:300px"  method="get">
    <input  type="text" name="search3" placeholder="Chercher par Nom" required value="<?php if(isset($_GET['search3'])){echo $_GET['search3']; } ?>">
    <button  type="submit"><i class="fa fa-search"></i></button><br><br>
 
      </form>
    
    
 
</div>
<br/>
<div class="flex">
      <?php
      include_once 'connexion.php';
      session_start();
      
      if(isset($_GET['search']) )
                                    {

     
       $filtervalues = isset($_GET['search']) ? $_GET['search'] : NULL;

    /*   $filtervalues3 = $_GET['search3'];
       $filtervalues4 = $_GET['search4'];
      $sql = "SELECT * FROM `games` WHERE  CONCAT( `ID_Game`) LIKE '%$filtervalues%' ";
       $sql2 = "SELECT * FROM `games` WHERE  CONCAT(  `Name`) LIKE '%$filtervalues2%' ";*/
       $sql = "SELECT * FROM `games` WHERE  CONCAT( `Type`) LIKE '%$filtervalues%' ";
      
      
        
      
      
      $result = $conn->query($sql);
    
      /*$result3 = $conn->query($sql3);
      $result4= $conn->query($sql4);*/
      

      if ($result->num_rows > 0) {
           
        // output data of each row
        while($row = $result->fetch_assoc() ) {
       ?>
           
       
            <div>
            <div class="movie" >
          <?php  echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt="image"  >';?>
            <div class="movie-info">
            <h3><?php echo  utf8_encode($row['Name']); ?></h3>
            
            <span><?php echo  $row['Age']; ?></span>
            <strong><?php echo utf8_encode ($row['Type']); ?></strong>
            <br/>
           
                      </div>
                      <div class="movie-overview">
                        <h2>Details</h2>
                       
                        <p><?php echo utf8_encode (   $row['Abstract']); ?></p>
                        <button class="btn2">Reservez</button>
                      </div>
                    </div>
        </div>
          
      
      
      <?php
        }
      
      } 
    

    }
    else  if(isset($_GET['search2']) ) {

    
     
    $filtervalues2 = isset($_GET['search2']) ? $_GET['search2'] : NULL;

    /*   $filtervalues3 = $_GET['search3'];
       $filtervalues4 = $_GET['search4'];
      $sql = "SELECT * FROM `games` WHERE  CONCAT( `ID_Game`) LIKE '%$filtervalues%' ";
       $sql2 = "SELECT * FROM `games` WHERE  CONCAT(  `Name`) LIKE '%$filtervalues2%' ";*/
       $sql2 = "SELECT * FROM `games` WHERE  CONCAT( `Age`) LIKE '%$filtervalues2%' ";
      
      
        
      
      
      $result2 = $conn->query($sql2);
    
      /*$result3 = $conn->query($sql3);
      $result4= $conn->query($sql4);*/
      

      if ($result2->num_rows > 0) {
           
        // output data of each row
        while($row = $result2->fetch_assoc() ) {
       ?>
           
       
           <div>
            <div class="movie" >
          <?php  echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt="image"  >';?>
            <div class="movie-info">
            <h3><?php echo  utf8_encode($row['Name']); ?></h3>
            
            <span><?php echo  $row['Age']; ?></span>
            <strong><?php echo utf8_encode ($row['Type']); ?></strong>
            <br/>
           
                      </div>
                      <div class="movie-overview">
                        <h2>Details</h2>
                       
                        <p><?php echo utf8_encode (   $row['Abstract']); ?></p>
                        <button class="btn2">Reservez</button>
                      </div>
                    </div>
        </div>
          
      
      
      <?php
        }


      }}
      else  if(isset($_GET['search3']) ) {

    
     
        $filtervalues3 = isset($_GET['search3']) ? $_GET['search3'] : NULL;
    
        /*   $filtervalues3 = $_GET['search3'];
           $filtervalues4 = $_GET['search4'];
          $sql = "SELECT * FROM `games` WHERE  CONCAT( `ID_Game`) LIKE '%$filtervalues%' ";
           $sql3 = "SELECT * FROM `games` WHERE  CONCAT(  `Name`) LIKE '%$filtervalues3%' ";*/
           $sql3 = "SELECT * FROM `games` WHERE  CONCAT( `Name`) LIKE '%$filtervalues3%' ";
          
          
            
          
          
          $result3 = $conn->query($sql3);
        
          /*$result3 = $conn->query($sql3);
          $result4= $conn->query($sql4);*/
          
    
          if ($result3->num_rows > 0) {
               
            // output data of each row
            while($row = $result3->fetch_assoc() ) {
           ?>
               
           
               <div>
            <div class="movie" >
          <?php  echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt="image"  >';?>
            <div class="movie-info">
            <h3><?php echo  utf8_encode($row['Name']); ?></h3>
            
            <span><?php echo  $row['Age']; ?></span>
            <strong><?php echo utf8_encode ($row['Type']); ?></strong>
            <br/>
           
                      </div>
                      <div class="movie-overview">
                        <h2>Details</h2>
                       
                        <p><?php echo utf8_encode (   $row['Abstract']); ?></p>
                        <button class="btn2">Reservez</button>
                      </div>
                    </div>
        </div>
          
          
          
          <?php
            }
    
    
          }}
          
       

      ?>
      </div>
    

 
</body>
</html>