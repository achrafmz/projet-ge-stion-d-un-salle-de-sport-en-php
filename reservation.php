<?php
session_start();
$datereservation = $_SESSION['date_reservation'];
// Vérification de l'existence des données dans la session
if (isset($_SESSION['nom1'], $_SESSION['date1'], $_SESSION['campus1'],$_SESSION['coderes'])) {
    $nom1 = $_SESSION['nom1'];
    $date1 = $_SESSION['date1'];
    $campus1 = $_SESSION['campus1'];
    $coderes1 = $_SESSION['coderes'];
} // <= Ici, la partie du code était mal formée, il n'est pas nécessaire de mettre un point-virgule ici.
?>

<html>
<head>
<style>


div.bordure {
  
border-bottom:1px solid black;
}
</style>
</head>
<body>
  
  <center>

  
<table border="2px">
<tr>
  <th height="100px" width="900px">
    <p style="font-size: 40px; font-weight: 400;">POWER FITNES</p>
  </th>
</tr>
<tr>
  <td>
   <div style="font-size: 19px ; font-weight: 400; margin-left: 20px;">Recu de reservation d'une seance d'essai</div>  <br>
    <div style="margin-left: 650PX; font-size: 19px ; font-weight: 400;">Recu edité  <?php echo " $datereservation";?></div> <br>
    <div style=" font-size: 25px ; font-weight: 400;"> <strong> code de reservation:</strong><?php echo $coderes1; ?></div> <br>
    <div style=" font-size: 25px ; font-weight: 400;"><strong> Nom:</strong> <?php echo $nom1; ?> </div><br>
    <div style=" font-size: 25px ; font-weight: 400;"> <strong>Date:</strong>  <?php  echo $date1; ?> </div><br>
    <div style=" font-size: 25px ; font-weight: 400;"><strong> campus:</strong>  <?php echo $campus1; ?></div><br>
  <br><br><br>
  <div  class="bordure"></div>
  <center> <p class="text" style="font-size: 20px; font-weight: 600; ">©2023 FITNESS POWER</p></center><br>
  </td>
</tr>
</table><br>
<button onclick="window.print();return false;">Print</button>
</center>

</body>
</html>
