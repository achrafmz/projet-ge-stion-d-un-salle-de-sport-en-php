<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

    //include connection file
    include("connection.php");
    $connection= new connection;
    $connection->selectDatabase('powerdata');
    include('client.php');
    client::deleteClient('client',$connection->conn,$id);

}
?>
