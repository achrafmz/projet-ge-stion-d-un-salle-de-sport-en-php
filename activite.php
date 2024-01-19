
<?php
session_start();

// Capturer la date actuelle
$dateReservation= date("Y-m-d"); // Format: Année-Mois-Jour Heure:Minute:Seconde

// Stocker la date d'inscription dans une variable de session

$_SESSION['date_reservation'] = $dateReservation;

//include connection file
include('connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('powerdata');
$emailValue = "";
$nameValue = "";
$dateValue = "";
$errorMesage = "";
$successMesage = "";
if(isset($_POST["submit"])){

    $emailValue = $_POST["email"];
    $nameValue = $_POST["nom"];
    $dateValue = $_POST["date"];
    $idCampusValue=$_POST["campus"];
   
    

    if(empty($emailValue) || empty($nameValue) || empty($dateValue)){

            $errorMesage = "vous devez  remplir tous les champs!";

    }else{
       
      
header("location:reservation.php");
    //include the client file
    include('client1.php');

    //create new instance of client class with the values of the inputs
    $client = new reservation($nameValue,$emailValue,$dateValue,$idCampusValue);

//call the insertClient method
$client->insertClient('reservation',$connection->conn);

//give the $successMesage the value of the static $successMsg of the class
$successMesage = reservation::$successMsg;

//give the $errorMesage the value of the static $errorMsg of the class
$errorMesage = reservation::$errorMsg;

$emailValue = "";
$nameValue = "";
$dateValue = "";   
      
    }
}

?>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .background-image {
  width: 100%;
  height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
  animation: changeBackground 20s linear infinite;  /* Change toutes les 10 secondes, ajustez le temps selon vos préférences */
}

@keyframes changeBackground {
  0% { background-image: url('https://img.freepik.com/photos-gratuite/jeune-homme-remise-forme-studio_7502-5008.jpg'); } /* Changez 'image1.jpg' avec le chemin de votre première image */
  60% { background-image: url('https://w0.peakpx.com/wallpaper/315/293/HD-wallpaper-sports-weightlifting-bodybuilder-gym-man-muscle.jpg'); } /* Changez 'image2.jpg' avec le chemin de votre deuxième image */
  100% { background-image: url('https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGd5bXxlbnwwfHwwfHx8MA%3D%3D'); } /* Changez 'image3.jpg' avec le chemin de votre troisième image */
}
    input[type=text], select {
  width: 350px;
  padding: 12px 20px;
    margin: 8px 0;
   background-color: white;
  display: inline-block;
  border: 3px solid white;
  border-radius: 4px;
  box-sizing: border-box;
  color: #000000;
}
input[type=date], select {
  width: 350px;
  padding: 12px 20px;
    margin: 8px 0;
   background-color: white;
  display: inline-block;
  border: 3px solid white;
  border-radius: 4px;
  box-sizing: border-box;
  color: #000000;
}
input[type=email], select {
  width: 350px;
  padding: 12px 20px;
    margin: 8px 0;
   background-color: white;
  display: inline-block;
  border: 3px solid whitE;
  border-radius: 4px;
  box-sizing: border-box;
  color: #000000;
}
   /* Style du cadre noir */
   body{
    max-width: 100%;
   }
.cadre-noir {
  background-color: black;
  padding: 20px; /* Espace intérieur du cadre */
  display: flex;
  flex-wrap: wrap;
  gap: 10px; /* Espacement entre les images */
  height: 50%;
}

/* Style des images */
.photos img {
  width: 400px; /* Ajustez la taille des images selon vos besoins */
  height: auto;
  border: 2px solid white; /* Bordure blanche autour des images */
}
.container1 {
  position: relative;
  width: 28.5%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
  height: 100%;
  opacity: 1;
}


.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.7);
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: .5s ease;
}

.container1:hover .overlay {
  height: 100%;
  width: 100%;

}
.container1: .overlay {
  height: 100%;
  width: 100%;
  
}
.text {
  white-space: nowrap; 
  color: white;
  font-size: 30px;
  position: absolute;
  overflow: hidden;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  font-weight: 700;
 
}
.text1 {
  white-space: nowrap; 
  color: white;
  font-size: 15px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  font-weight: 700;
  left:35%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  font-weight: 600;
}



 .btn{
    color: #000000;
    background-color: transparent;
    font-family: 'Nunito', sans-serif;
    font-size: 20px;
    font-weight: 700;
    text-transform: capitalize;
    letter-spacing: 1px;
    border-radius: 20px/50px;
    border: 2px solid #000000;
    transition: all 0.5s ease 0s;
  height: 60px;
}
.btn:hover{
    color: #fffcfc;
    
    font-family: 'Nunito', sans-serif;
    font-size: 20px;
    font-weight: 700;
    text-transform: capitalize;
    letter-spacing: 1px;
    border-radius: 20px/50px;
    border: 2px solid #000000;
    transition: all 0.5s ease 0s;
  height: 60px;
  background-color: #000000;
}

@media only screen and (max-width: 767px){
    .btn{ margin-bottom: 20px; }
}
   #mainNavigation a {
      font-family: 'Cabin', sans-serif;
      font-size:14px;
      text-transform:uppercase;
      letter-spacing:2px;
      text-shadow:1px 1px 2px rgba(0,0,0,0.4)
    }
    
    .dropdown-menu {
      background:#6d7d03
    }
    a.dropdown-toggle {
      color:#fdeeac !important
    }
    a.dropdown-item:hover {
      color:#fdeeac !important
    }
    .nav-item a{
      color:#dfdfdf;
    }
    .nav-item a:hover {
      color:#fdeeac
    }
    .nav-item{
      min-width:12vw;
    }
    #mainNavigation {
      position:fixed;
      top:0;
      left:0;
      width:100%;
      z-index:123;
      padding-bottom:120px;
      /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#000000+0,000000+100&0.65+0,0+100;Neutral+Density */
    background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 0%, rgba(0,0,0,0) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
    }
    #navbarNavDropdown.collapsing .navbar-nav,
    #navbarNavDropdown.show .navbar-nav{
      background:#037582;
      padding:12px;
    }
    .container {
    position: relative;
    max-width: 100%;
    margin: 0 auto;
  }
  
  .container img {vertical-align: middle;}
  
  .container .content {
    position: absolute;
    bottom: 0;
    background: rgb(0, 0, 1); /* Fallback color */
    background: rgba(0, 0, 0,0.3); /* Black background with 0.5 opacity */
    color: #f1f1f1;
    width: 100%;
    height: 100%;
    padding: 20px;
  }
  div.bordure {
border-bottom:1px solid rgb(255, 255, 255);
}
.btn1{
    color: #fffdfd;
    background-color: transparent;
    font-family: 'Nunito', sans-serif;
    font-size: 20px;
    font-weight: 700;
    text-transform: capitalize;
    letter-spacing: 1px;
    border-radius: 200px/500px;
    border: 2px solid #fff5f5;
    transition: all 3s ease 0s;
  height: 60px;
  width: 120px;
}
.btn1:hover{
    color: #000000;
    background-color: white;
    font-family: 'Nunito', sans-serif;
    font-size: 20px;
    font-weight: 700;
    text-transform: capitalize;
    letter-spacing: 1px;
    border-radius: 20px/50px;
    border: 2px solid #ffffff;
    transition: all 0.5s ease 0s;
  height: 60px;
}

ul.social-network {
	list-style: none;
	display: inline;
	margin-left:0 !important;
	padding: 0;
}
ul.social-network li {
	display: inline;
	margin: 0 5px;
}

.social-network a.icoRss:hover {
	background-color: #F56505;
}
.social-network a.icoFacebook:hover {
	background-color:#3B5998;
}
.social-network a.icoTwitter:hover {
	background-color:#33ccff;
}
.social-network a.icoGoogle:hover {
	background-color:#BD3518;
}
.social-network a.icoVimeo:hover {
	background-color:#0590B8;
}
.social-network a.icoinstagram:hover {
	background-color:rgb(177, 61, 61)), 67, 0);
}
.social-network a.icoRss:hover i, .social-network a.icoFacebook:hover i, .social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i, .social-network a.icoVimeo:hover i, .social-network a.icoinstagram:hover i {
	color:#fff;
}
a.socialIcon:hover, .socialHoverClass {
	color:#44BCDD;
}

.social-circle li a {
	display:inline-block;
	position:relative;
	margin:0 auto 0 auto;
	-moz-border-radius:50%;
	-webkit-border-radius:50%;
	border-radius:50%;
	text-align:center;
	width: 50px;
	height: 50px;
	font-size:20px;
	background-color: #D3D3D3;
}
.social-circle li i {
	margin:0;
	line-height:50px;
	text-align: center;
}

.social-circle li a:hover i, .triggeredHover {
	-moz-transform: rotate(360deg);
	-webkit-transform: rotate(360deg);
	-ms--transform: rotate(360deg);
	transform: rotate(360deg);
	-webkit-transition: all 0.2s;
	-moz-transition: all 0.2s;
	-o-transition: all 0.2s;
	-ms-transition: all 0.2s;
	transition: all 0.2s;
}
.social-circle i {
	color: #fff;
	-webkit-transition: all 0.8s;
	-moz-transition: all 0.8s;
	-o-transition: all 0.8s;
	-ms-transition: all 0.8s;
	transition: all 0.8s;
}

    </style>
  </head>
  <body>
  <div class="background-image">
    <div class="container">
       <img  src="https://azeoo.com/app/uploads/2022/03/9-erreurs-classiques-quune-salle-de-sport-doit-eviter-1-2.jpg" alt="Notebook" style="width:100%; height: 100%;">
      <div class="content">
    <div id="mainNavigation">
      <br>
      <center><div style="font-size: 30pX;">power Fitness</div></center>
      <nav role="navigation">
        <div class="py-3 text-center border-bottom">
          <img src="/static_files/images/logos/logo_3_white_2.png" alt="" class="invert">
          
        </div>
      </nav>
      
      <div class="navbar-expand-md">
        <div class="navbar-dark text-center my-2">
          <button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
          </button>
        </div>
        <div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mx-auto ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="activite.php">Activite</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">tarifs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">clubs</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="contact.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                contact
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Blog</a></li>
                <li><a class="dropdown-item" href="#">About Us</a></li>
                <li><a class="dropdown-item" href="#">Contact us</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <a href="#essai1"><button style="margin-left: 45%; margin-top: 390PX; border-color: white; color: white; width: 140px;" class="btn " href="#">
      Join Us
  </button>  </a>  </div>
    
  </div>
  <br><br><br><br><br><br><br><br><br>
  <h1 style=" margin-left: 20px; color: WHITE;">Notre Histoire</h1> <BR>
    <div style=" font-size:20Px; font-weight: 600; margin-left: 20px; margin-top: -120px;">
      Améliore la souplesse générale et réduit le risque de déchirures  <br> musculaires et de douleur du dos. et ameliore votre masse musculaire <br> et votre condition physique avec power fitness  </div >
    <br>
    
    
        
          <div style="background-color: #000000; height: 380px; width: 500px; margin-left: 900px; margin-top: -250px;" ></div>
    <img src="https://img.freepik.com/photos-gratuite/bel-homme-noir-est-engage-dans-salle-sport_1157-32175.jpg?size=626&ext=jpg&ga=GA1.1.1826414947.1699142400&semt=ais" alt=""   height="300px" wiidth="600px"  style="margin-left: 920px; margin-top: -335PX;border: 2px solid rgb(0, 0, 0); "> 
    
<br><br><br><br><br>


<div style="background-color: #000000; height: 380px; width: 500px; margin-left: 20px; margin-top: --90px;" ></div>
    <img src="https://drinkocany.com/wp-content/uploads/2023/01/kickboxing-0.png" alt=""   height="300px" wiidth="600px"  style="margin-left: 70px; margin-top: -340px;border: 2px solid rgb(0, 0, 0); "> 
     
    <div style=" font-size:20Px; font-weight: 600; margin-left: 750px; margin-top: -300px;">
        La boxe est un sport de combat pratiqué bien avant l’époque de la Grèce antique<br>  et des Jeux olympiques originaux. Il a été utilisé pour former les gens à la performance dans l’art<br> de la frappe, ainsi qu’au conditionnement physique général. <br> et aussi menatl avec nous</div >
   
 <br><br><br><br><br>
 <div style=" font-size:20Px; font-weight: 600; margin-left: 20px; margin-top:  240px;">
  Faites travailler votre cœur et vos poumons avec notre tout nouveau cardio. <br> Tous ont des ventilateurs personnels pour vous garder au frais et des dizaines <br> de téléviseurs 4K 72" pour votre divertissement. Nous les avons tous : tapis de course,  <br>tapis d'escalier, vélos droits/couchés/spin, rameurs, vélos elliptiques.    </div >
<br>
<div style="background-color: #000000; height: 380px; width: 500px; margin-left: 915px; margin-top: -230px;" ></div>
<img src="https://media.istockphoto.com/id/1279902517/fr/photo/soyez-aussi-fort-que-vous-%C3%AAtes-n%C3%A9-pour-%C3%AAtre.jpg?s=170667a&w=0&k=20&c=PnNt0RunbpKjHvce_VmKKNuANb0OoJf-5Pcfh7W4MOQ=" alt=""   height="300px" wiidth="600px"  style="margin-left: 940px; margin-top: -335PX;border: 2px solid rgb(0, 0, 0); "> 
<br><br><br><br><br>

<div style="background-color: #000000; height: 380px; width: 500px; margin-left: 20px; margin-top: --120px;" ></div>
    <img src="https://img.freepik.com/photos-gratuite/portrait-studio-du-combattant-karate-brutal-barbu-vetu-kimono-blanc-fond-gris_613910-1884.jpg?size=626&ext=jpg&ga=GA1.1.1880011253.1698883200&semt=ais" alt=""   height="300px" wiidth="800px"  style="margin-left: 65px; margin-top: -340px;border: 2px solid rgb(0, 0, 0); "> 
   

       
    <div style=" font-size:20Px; font-weight: 600; margin-left: 750px; margin-top: -300px;">
    À l’adolescence et dans la vingtaine, le karaté permet de canaliser l’énergie et de décompresser tout <br> en inculquant le sens de la discipline et le respect d’autrui.
 <br> En ce qui concerne les trentenaires et quadragénaires, la pratique du karaté permet de garder la forme  <br>   de se sentir bien et de rester flexibles. C’est aussi un excellent exercice cardiovasculaire, </div >
 




<br><br><br><br><br><br><br>
<br>
<div class="container1">
     

<BR><BR></BR></BR>
<div style="background-color: #000000; width: 350%; height: 1050px; " >

  <div class="text" style="margin-left: 120%;margin-top: -700px; " id="essai1">GET YOUR FREE 1-DAY PASS</div>
<form  method="post" >
  <input value="<?php echo $nameValue ?>" type="text" name="nom" id="nom" style="margin-left: 300px; margin-top: 170px;" placeholder="Name" >

  <input value="<?php echo $emailValue ?>" type="email" name="email" id="email" style="margin-left: 100px;" placeholder="email">
 
  <br>
  <select name='campus' style="margin-left: 300px;">
                <option selected>Select a campus</option>
                    <?php
                        include('campus.php');
                        $campuses=campus::selectAllcampuses('campuses',$connection->conn);
                        foreach($campuses as $campus){

                                echo "<option value='$campus[id]'>$campus[namec]</option>";

                        }
                    ?>
                </select>
  
  <input  value="<?php echo $dateValue ?>" type="date" name="date" id="date"   style="margin-left: 100px;"placeholder="date"><br><br>
  <center><span style="color: red;"> <?php echo $errorMesage ?></span></center><br>
  <input type="submit" name="submit" style="margin-left: 650px;" class="btn1" value="submit">
  
  </form>
  <br><br><br><br><br><br>
  <div class="bordure"></div>
 <p class="text" style="margin-left: -50px; margin-top: -100px;" >Power Fitness</p>
 <p  class="text" style="font-size: 20px; font-weight: 600; margin-left: -80px; margin-top: -50px;">06 77 88 66 55</p>
 <p  class="text" style="font-size: 20px; font-weight: 600; margin-left: -50px; ">powerfit@gmail.com</p>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 800px; margin-top: -50px;">Clubs</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 800px; ">Activites</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 1000px; margin-top: -50px;">Abonement</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 1000px;">Sign In</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 800px; margin-top: 50px;">Contact</a>
 <br><br><br><br><br><br><br><br><br><br><br><br><br>
<div  class="bordure"></div>
 <p class="text" style="font-size: 20px; font-weight: 600; margin-top: 110px; margin-left: 500px">©2023 FITNESS POWER</p><br>
 <div style="margin-left: 620px; margin-top: 30px;">
  <ul class="social-network social-circle">
    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#" class="icoinstagram" title="instagram"><i class="fa fa-instagram"></i></a></li>
  </ul>
</div>
</div>
<?php

// Vérification de la méthode d'envoi et récupération des données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom1 = $_POST['nom'] ?? '';
    $date1 = $_POST['date'] ?? '';
    $campus1 = $_POST['campus'] ?? '';

    // Stockage des données dans des variables de session pour une utilisation ultérieure
    $_SESSION['nom1'] = $nom1;
    $_SESSION['date1'] = $date1;
    $_SESSION['campus1'] = $campus1;

    // Redirection vers une autre page ou traitement supplémentaire si nécessaire
 
    // Assure que le script s'arrête ici pour la redirection
}
?>
  </body>
</html>