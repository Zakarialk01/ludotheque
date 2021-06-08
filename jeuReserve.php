
<!Doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jeux réservés</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin.css">

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
    <table>
        <thead>
<tr>
<th>Id</th>
<th>Nom  </th>
<th> Email </th>
<th> jeu réservé </th>
</tr>
</thead>
<?php
include 'connexion.php';
$sql ="SELECT * FROM `booking` ";
 $result = $conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo "<tr><td>". $row["Id_booking"] ."</td><td>". $row["Name"] ."</td><td>". $row["Email"] ."</td><td>". $row["Game_Name"]." </td></tr>";
}
echo "</table>";
}
else{
echo "il y a 0 reservation pour l'instant";
    }
$conn->close();
?>

</table>

</body>
</html>