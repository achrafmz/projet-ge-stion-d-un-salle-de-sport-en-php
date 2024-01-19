<?php

class contact{

public $id;
public $nom;
public $mail;
public $msg;
public $reg_date; 


public static $errorMsg1 = "";

public static $successMsg1="";


public function __construct($nom,$mail,$msg){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->nom = $nom;
    $this->mail = $mail;
    $this->msg = $msg;

}

public function insertClient($tableName,$conn){

//insert a client in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (name, email, message)
VALUES ('$this->nom', '$this->mail', '$this->msg')";
if (mysqli_query($conn, $sql)) {
self::$successMsg1= "New record created successfully";

} else {
    self::$errorMsg1 ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

public static function  selectAllClients($tableName,$conn){

//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id,name, email,message FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    }

}

static function selectClientById($tableName,$conn,$id){
    //select a client by id, and return the row result
    $sql = "SELECT name, email,message FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}

static function updateClient($client,$tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET name='$client->nom',email='$client->nom',message='$client->msg' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg1= "New record updated successfully";
header("Location:admincontact.php");
        } else {
            self::$errorMsg1= "Error updating record: " . mysqli_error($conn);
        }


}

static function deleteClient($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg1= "Record deleted successfully";
    header("Location:admincontact.php");
} else {
    self::$errorMsg1= "Error deleting record: " . mysqli_error($conn);
}

    }
    static function deleteAll($tableName,$conn){
        //delet a client by his id, and send the user to read.php
        $sql = "DELETE FROM $tableName ";
    
    if (mysqli_query($conn, $sql)) {
        self::$successMsg1= "Record deleted successfully";
        header("Location:admincontact.php");
    } else {
        self::$errorMsg1= "Error deleting record: " . mysqli_error($conn);
    }
    
        }
}
?>
