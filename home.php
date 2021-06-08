
<?php
include_once 'connexion.php';


	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else  {
    if(isset($_POST['submit'])){
      $Name=$_POST['Name'];
        $Email=$_POST['Email'];
      $Sujet=$_POST['Sujet'] ;
	
               if(empty($Name) || empty($Email) || empty ($Sujet)){
                  echo ' veuillez remplir les champs ! ';
                  }
                 else {
                  
                  $sql="insert into contact (Nom,Email,Sujet) values('$Name','$Email','$Sujet')";
                  $result=mysqli_query($conn,$sql);
             if($result){
                echo "<script>alert(\" Votre formulaire a été envoyer , merci ! \")</script>";
            
                 }
              else {
                echo "<script>alert(\" erreur dans l'envoi \")</script>";
              }

  }
}
    }
?>





<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="home.css">
  <script src="script.js"></script>
  
</head>
<body>

  
     
          <div class="header">
            <div class="container">
              <div class="navbar">
                <div class="logo">
                  <img src="img/ludo.png" width="55px" />
                </div>
                <nav class="nav">
                  <ul>
                    <li>
                      <a class="scroll" href="#advantages">
                        Benefits
                      </a>
                    </li>
    
                    <li>
                      <a class="scroll" href="#contact">
                        Contact
                      </a>
                    </li>
                    <li id="scroll">
                      <a href="inscription.html">Login | Register</a>
                    </li>
                  </ul>
                </nav>
              </div>
    
              <div class="row" id="#">
                <div class="col-2">
                  <h1>
                    Bienvenue chez nous ! <br />
                    Ludothèque pour toujours
                  </h1>
                  <br></br>
                  <p>
                    Le lorem ipsum est, en imprimerie, une suite de mots sans
                    signification utilisée à titre provisoire pour calibrer une mise
                    en page, le texte définitif
                  </p>
                  <a  class="btn">
                    
                    Voir la boutique
                  </a>
                </div>
                <div class="col-2">
                  <img src="img/game.png"/>
                </div>
              </div>
            </div>
          </div>
    
          <h1 class="h1" id="advantages">
            Nos <span class="span"> Advantages</span>
          </h1>
          <div class="row2">
            <div class="column">
              <div class="card">
                <img class="payment" src="img/document.png" width="125px"></img>
                <h3>Se documenter sur la ludothèque</h3>
    
                <p>stripe options</p>
              </div>
            </div>
    
            <div class="column">
              <div class="card">
                <img  src="img/play.png" width="146px"></img>
                <h3>Venir jouer sur palce</h3>
    
                <p>plus de 300 jeux disponibles venez sur place </p>
              </div>
            </div>
    
            <div class="column">
              <div class="card">
                <img src="img/discuss.png" width="200px"></img>
                <h3>Meeting</h3>
                <p>Dicuss and share ideas </p>
              </div>
            </div>
          </div>
          <div class="row2">
            <div class="column">
              <div class="card">
                <img src="img/compatible.png" width="164px"></img>
                <h3>Compatibility</h3>
                <p>Compatibility with all devices</p>
              </div>
            </div>
    
            <div class="column">
              <div class="card">
                <img src="img/payments.png" width="158px"></img>
                <h3>Payments sécurisé</h3>
                <p>payments securisé avec stripe </p>
              </div>
            </div>
    
            <div class="column">
              <div class="card">
                <img class="benefits" src="img/emprunt.png" width="145px"></img>
                <h3> Emprunter des jeux </h3>
                <p>customer satisfaction is my goal</p>
              </div>
            </div>
          </div>
          <div class="container1" id="contact">
            <div>
              <h1 class="h11">Contact Us</h1>
            </div>
            <div class="row3 ">
              <div class="column2">
                <div class="card2">
                  <div class="flex">
                    <img class="image" src="img/map.png" />
                  </div>
                </div>
              </div>
              <div class="column2">
                <form method="POST" action="">
                
                  <label for="fname">Votre Nom :</label>
                  <input
                    class="input"
                    type="text"
                    id="Name"
                    name="Name"
                    placeholder="Votre Nom.."
                   
                  />
                  <label for="country">Votre email :</label>
                  <input
                    class="input"
                    type="email"
                    name="Email"
                    id="Email"
                    placeholder=" Votre email "
                   
                  />
          
                  <label for="subject">Sujet de votre message :</label>
                  <textarea  
                  style="height: 170px"
                    class="textarea"
                    id="Sujet"
                    name="Sujet"
                    placeholder="Dites nous ce que vous voulez ..."
           
                   
                  ></textarea>
                  <button
                    class="button"
                    type="submit"
                    value="submit"
                    name="submit"
               id="envoyer"
               disabled
                  >
                    Submit
                  </button>
                </form>
              </div>
            </div>
          </div>

          <hr />
          <footer class="footer2">
            <div class="container4">
              <div class="row4">
                <div class="footer2-col">
                  <h4>company</h4>
                  <ul>
                    <li>
                      <a href="#">A propos</a>
                    </li>
                    <li>
                      <a href="#">Nos services</a>
                    </li>
                    <li>
                      <a href="#">privacy policy</a>
                    </li>
                  </ul>
                </div>
                <div class="footer2-col">
                  <h4>get help</h4>
                  <ul>
                    <li>
                      <a href="#">FAQ</a>
                    </li>
                   
                    <li>
                      <a href="#">Retour et avis </a>
                    </li>
                  </ul>
                </div>
                <div class="footer2-col">
                  <h4>online shop</h4>
                  <ul>
                    <li>
                      <a href="#">watch</a>
                    </li>
                 
                  </ul>
                </div>
                <div class="footer2-col">
                  <h4>follow us</h4>
                  <div class="social-links">
                    <a href="#">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </footer>
    
          <div class="copyright">
            <h5 class="copyright">
              Copyright © 2021 All right reserved || Made with ❤️ by LOUKILIZAKARIA
            </h5>
          </div>
        
      
    
  
</body>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/
jquery.min.js"></script>
<script type="text/javascript">

 
  
 
    $("#Email").keyup(function(event) {
        validateInputs();
    });
 
    $("#Sujet").keyup(function(event) {
        validateInputs();
    });
 
    $("#Name").keyup(function(event) {
        validateInputs();
    });
 
    function validateInputs(){
        var disableButton = false;

    
        var Nom = $("#Name").val();
        var Email = $("#Email").val();
        var Resume = $("#Sujet").val();
 
        if(Email.length == 0 || Nom.length == 0 || Resume.length == 0)
            disableButton = true;
 
        $('#envoyer').attr('disabled', disableButton);
    }
</script>