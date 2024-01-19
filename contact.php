<?php
//include connection file
include('connection.php');

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('powerdata');
$mailValue = "";
$nomValue = "";
$msgValue = "";
$errorMessage = "";

if(isset($_POST["submit1"])){

    $mailValue = $_POST["mail"];
    $nomValue = $_POST["name"];
    $msgValue = $_POST["msg"];
    

    if(empty($mailValue) || empty($msgValue) || empty($nomValue)){

            $errorMessage = "vous devez remplir tous la formulaire";

    }else{
       
    //include the client file
    include('client2.php');

    //create new instance of client class with the values of the inputs
    $client = new contact($nomValue,$mailValue,$msgValue);

//call the insertClient method
$client->insertClient('contact',$connection->conn);


//give the $errorMesage the value of the static $errorMsg of the class
$errorMessage = contact::$errorMsg1;

$mailValue = "";
$nomValue = "";
$msgValue = "";   
      
    }
}

?>

<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    
    input[type=text], textarea {
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
input[type=textarea], textarea {
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
input[type=email], textarea {
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
.demo10{background:#000000;padding:30px 0}
.pricingTable10{text-align:center}
.pricingTable10 .pricingTable-header{padding:30px 0;background:#4d4d4d;position:relative;transition:all .3s ease 0s}
.pricingTable10:hover .pricingTable-header{background:#020202}
.pricingTable10 .pricingTable-header:after,.pricingTable10 .pricingTable-header:before{content:"";width:16px;height:16px;border-radius:50%;border:1px solid #d9d9d8;position:absolute;bottom:12px}
.pricingTable10 .pricingTable-header:before{left:40px}
.pricingTable10 .pricingTable-header:after{right:40px}
.pricingTable10 .heading{font-size:20px;color:#fff;text-transform:uppercase;letter-spacing:2px;margin-top:0}
.pricingTable10 .price-value{display:inline-block;position:relative;font-size:55px;font-weight:700;color:#09b1c5;transition:all .3s ease 0s}
.pricingTable10:hover .price-value{color:#fff}
.pricingTable10 .currency{font-size:30px;font-weight:700;position:absolute;top:6px;left:-19px}
.pricingTable10 .month{font-size:16px;color:#fff;position:absolute;bottom:15px;right:-30px;text-transform:uppercase}
.pricingTable10 .pricing-content{padding-top:50px;background:#fff;position:relative}
.pricingTable10 .pricing-content:after,.pricingTable10 .pricing-content:before{content:"";width:16px;height:16px;border-radius:50%;border:1px solid #7c7c7c;position:absolute;top:12px}
.pricingTable10 .pricing-content:before{left:40px}
.pricingTable10 .pricing-content:after{right:40px}
.pricingTable10 .pricing-content ul{padding:0 20px;margin:0;list-style:none}
.pricingTable10 .pricing-content ul:after,.pricingTable10 .pricing-content ul:before{content:"";width:8px;height:46px;border-radius:3px;background:linear-gradient(to bottom,#818282 50%,#727373 50%);position:absolute;top:-22px;z-index:1;box-shadow:0 0 5px #707070;transition:all .3s ease 0s}
.pricingTable10:hover .pricing-content ul:after,.pricingTable10:hover .pricing-content ul:before{background:linear-gradient(to bottom,#40c4db 50%,#34bacc 50%)}
.pricingTable10 .pricing-content ul:before{left:44px}
.pricingTable10 .pricing-content ul:after{right:44px}
.pricingTable10 .pricing-content ul li{font-size:15px;font-weight:700;color:#777473;padding:10px 0;border-bottom:1px solid #d9d9d8}
.pricingTable10 .pricing-content ul li:last-child{border-bottom:none}
.pricingTable10 .read{display:inline-block;font-size:16px;color:#fff;text-transform:uppercase;background:#d9d9d8;padding:8px 25px;margin:30px 0;transition:all .3s ease 0s}
.pricingTable10 .read:hover{text-decoration:none}
.pricingTable10:hover .read{background:#101010}
@media screen and (max-width:990px){.pricingTable10{margin-bottom:25px}
}
    </style>
  </head>
  <body>
    <div class="container">
       <img src="" alt="Notebook" style="width:100%; height: 80%;">
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
    
  </div>
  
  

        
  
    <div class="container1" style="margin-top:-600px;">


<div style="background-color: #000000; width: 350%; height: 1100px; " >
<br><br><br><br><br><br>

  <div class="text" style="margin-left: 120%;margin-top: -650px; " >Contact Us</div>
<form  method="post">
  <input type="text" name="name" id="name" style="margin-left: 300px; margin-top: 170px;" placeholder="name" >
  <input type="text" name="mail" id="mail" style="margin-left: 100px;" placeholder="email">
  <br><br>
 
  <center> <textarea id="msg" name="msg" style="margin-left:-24px; width:808px;"  placeholder="votre message"></textarea>< </center>
  <center> <span style="color:red;"><?php echo $errorMessage ?></span></center><br>
  <center><input type="submit" id="submite" name="submit1" value="submit" class="btn1"></center>

  </form>
  <br><br><br><br><br><br>
  <div class="bordure"></div>
 <p class="text" style="margin-left: -50px; margin-top: -80px;" >Power Fitness </p>
 <p  class="text" style="font-size: 20px; font-weight: 600; margin-left: -80px; margin-top: -30px;">06 77 88 66 55</p>
 <p  class="text" style="font-size: 20px; font-weight: 600; margin-left: -50px; margin-top: 10px; ">powerfit@gmail.com</p>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 800px; margin-top: -70px;">Clubs</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 800px; margin-top: -30px; ">Activites</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 1000px; margin-top: -70px;">Abonement</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 1000px; margin-top: -30px;">Sign In</a>
 <a href="" class="text" style="font-size: 20px; font-weight: 600; margin-left: 800px; margin-top: 18px;">Contact</a>
 <br><br><br><br><br><br><br><br><br><br><br><br><br>
<div style="margin-top:-110px;" class="bordure"></div>
 <p class="text" style="font-size: 20px; font-weight: 600; margin-top: 120px; margin-left: 500px">©2023 FITNESS POWER</p><br>
 <div style="margin-left: 620px; margin-top: 30px;">
  <ul class="social-network social-circle">
    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#" class="icoinstagram" title="instagram"><i class="fa fa-instagram"></i></a></li>
</ul>
</div>
</div>
</body>
</html>