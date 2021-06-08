
<?php
include 'connexion.php';



 
      
	
$conn = new mysqli('localhost','root','','react');
if(isset($_POST['upload'])){


if(!empty($_FILES['image']['tmp_name']) 
     && file_exists($_FILES['image']['tmp_name'])) {
    $file=  addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $filetmpname=$_FILES['image']['tmp_name'];
  
    $folder='img/';
  
    move_uploaded_file($_FILES['image']['tmp_name'], $filetmpname);

     }
    
    
  
  $Nom=$_POST['Name'];
  $Select=$_POST['select'];
  $Email=$_POST['Email'];


$query="INSERT INTO `booking`( `Name`, `Email`, `Game_Name`, `ImageClient`) VALUES ('$Nom','$Email','$Select','$file')";

$query_run= mysqli_query($conn,$query);
if($query_run){
  
  echo "<script>alert(\" +Ajout avec succés \")</script>";


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
  <title>Reservez jeu</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
</head>
<style>
.nav {
  height: 50px;
  width: 100%;
  background: rgb(45, 55, 114);
  position: relative;
  text-align: center;
  font-weight: 600;
  box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.25);
}

.nav > .nav-header {
  display: inline;
}
.nav > .nav-header > .nav-title {
  cursor: pointer;
  float: left;
}

.nav > .nav-header > .nav-title {
  display: inline-block;
  font-size: 22px;
  color: #fff;
  padding: 10px 10px 10px 10px;
}
.button_nav {
  padding: 17px;
  /* margin-left: auto; */
  background: rgb(45, 55, 114);
  color: white;
  font-weight: 700;

  border: none;
}

.nav > .nav-btn {
  display: none;
}

.nav > .nav-links {
  display: inline;
  cursor: pointer;
  background: rgb(45, 55, 114);
  font-size: 18px;
}

.nav > .nav-links > a {
  display: inline-block;
  padding: 13px 10px 13px 10px;
  text-decoration: none;
  color: #efefef;
}

.nav > .nav-links > a:hover {
  background-color: rgba(0, 0, 0, 0.3);
}

.nav > #nav-check {
  display: none;
}
.btn {
  font-size: 18px;
  padding: 14px;
  background:rgb(16, 21, 55);
  color: white;
  border: none;
  float: right;
    font-weight:bold
}
label{
  color: rgb(45, 55, 114);
}
.image2 {
  width: 80%;
 
  margin-top:15%
}

@media (max-width: 900px) {
  .nav > .nav-btn {
    display: inline-block;
    position: absolute;
    right: 0px;

    top: 0px;
  }
  .nav > .nav-btn > label {
    display: inline-block;
    width: 50px;

    padding: 13px;
  }

  .nav > .nav-btn > label > span {
    display: block;
    width: 25px;
    height: 10px;
    border-top: 2px solid #eee;
  }
  .nav > .nav-links {
    position: absolute;
    display: block;
    width: 100%;
    background: rgb(45, 55, 114);
    height: 0px;
    z-index: 6;
    transition: all 0.3s ease-in;
    overflow-y: hidden;
    top: 50px;
    left: 0px;
  }
  .nav > .nav-links > a {
    display: block;
    width: 100%;
  }
  .nav > #nav-check:not(:checked) ~ .nav-links {
    height: 0px;
  }
  .nav > #nav-check:checked ~ .nav-links {
    height: calc(50vh - 50px);
    overflow-y: auto;
  }
  .nav > .nav-links > .button_nav {
    float: left;
    background-color: darkgray;
    border-radius: 20%;
  }
}
@media screen and (max-width: 990px) {
  .column2 {
    width: 100%;
    margin-top: 0;

  }
  .container1{
    margin :0 auto
  }
  .image2 {

    margin-left:15%
  }
  .button {
    width: 100%;
  }
  form{
      width:70%;
      margin: 0 auto
  }
}



</style>
<body>


<div >

      <div class="nav" >
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
          <a> <i class="fa fa-fw fa-ticket" style="color:white"> </i> Reserver  </a>
 
        <a href="jeu.php" >   <i class="fa fa-fw fa-search" style="color:white"> </i> Recherche  </a>
        <a href="reservation.php" >   <i class="fa fa-fw fa-search" style="color:white"> </i> Mes Reservations  </a>



          <button class="btn"  name="btn" >
          <i class="fa fa-sign-out" ></i>  <a style="color:white;text-decoration:none" href = "logout.php">  Log out</a>
          </button>
        </div>
      </div>
      <br/>
      <br/>

 
   


      <div class="container1" id="contact">
      
            
            <div class="row3 ">

              <div class="column2">
                <div class="card2">
                  <div class="flex">
                    <img class="image2" src="img/booking (2).svg" />
                  </div>
                </div>
              </div>
              <br/>

              <div class="column2">
                <form method="POST" action="" enctype="multipart/form-data"  >

                <label> entrez Votre photo</label>
                <br/>
                <input class="input" style="color:black;" type="file" name="image" id="image" /> 
               
              
                  <br/>
                  <label for="fname">Nom du jeu </label>
     <select  class="select" name="select" id="select">
     <?php
     include 'connexion.php';
  
     $sql="SELECT `Name` FROM games";
     $result = $conn->query($sql);
     if($result->num_rows>0){
	
      while($row=$result->fetch_assoc()){
     
    ?>
      <option  id="select" value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>
    <?php
     }
    }

    ?>
    

</select>

<br/>


                  <label for="country">Votre Nom :</label>
                  <input
                    class="input"
                    type="text"
                    name="Name"
                    placeholder="Votre Nom  "
                    id="Name"
                   
                  />

          
                  <label for="subject">Votre Email :</label>
                  <input
                
                    class="textarea"
                    id="Email"
                    name="Email"
                    type="email"
                    placeholder="Votre email"
           
                   
                  ></input>
                  <button
                    class="btn"
                    style='float:left;border-radius:25px;font-weight:400;font-size:15px'
                    type="submit"
                    name="upload"
                    value="Envoyer"
                    id="reserver"
               disabled
                  >
                 Envoyer
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
 

    $("#select").keyup(function(event) {
        validateInputs();
    });
 
    $("#Name").keyup(function(event) {
        validateInputs();
    });
 
    $("#Email").keyup(function(event) {
        validateInputs();
    });
 
 
 
    function validateInputs(){
        var disableButton = false;
 
        var Name = $("#Name").val();
        var Email = $("#Email").val();
        var select = $("#select").val();

 
        if(Name.length == 0 || Email.length == 0 || select.length == 0)
            disableButton = true;
 
        $('#reserver').attr('disabled', disableButton);
    }
</script>

