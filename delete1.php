<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

include('connection.php');

$connection = new Connection();
$connection->selectDatabase('powerdata');

include('client1.php');

reservation::deleteClient('reservation',$connection->conn,$id);




}
?>
