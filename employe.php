<?php

class employe{

public $id;
public $firstname;
public $lastname;
public $phone;
public $ddn;
public $fonction;




public static $errorMsssg = "";

public static $successMsssg="";


public function __construct($firstname,$lastname,$phone,$ddn,$fonction){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->phone = $phone;
    $this->ddn = $ddn;
    $this->fonction = $fonction;
}

public function insertEmploye($tableName, $conn){
    $sql = "INSERT INTO $tableName (firstname, lastname, phone, ddn,fonction) VALUES ('$this->firstname', '$this->lastname', '$this->phone', '$this->ddn', '$this->fonction')";
    
    if (mysqli_query($conn, $sql)) {
        self::$successMsssg = "New record created successfully";
    } else {
        self::$errorMsssg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}



public static function  selectAllEmployes($tableName,$conn){

//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id, firstname, lastname,phone,ddn,fonction FROM $tableName ";
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





static function deleteEmploye($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsssg= "Record deleted successfully";
    header("Location:adminemploye.php");
} else {
    self::$errorMsssg= "Error deleting record: " . mysqli_error($conn);
}

  
    }
    static function updateClient($client,$tableName,$conn,$id){
        //update a client of $id, with the values of $client in parameter
        //and send the user to read.php
        $sql = "UPDATE $tableName SET firstname='$client->firstname',lastname='$client->lastname',phone='$client->phone',ddn='$client->ddn',fonction='$client->fonction' WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
    header("Location:admiemploye.php");
            } else {
                self::$errorMsg= "Error updating record: " . mysqli_error($conn);
            }
    
    
    }
    static function selectClientById($tableName,$conn,$id){
        //select a client by id, and return the row result
        $sql = "SELECT firstname, lastname,phone,ddn,fonction FROM $tableName  WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        
        }
        return $row;
    }
    public static function selectEmployeByfonctionId($tableName,$conn,$fonction){
    
        $sql = "SELECT id, firstname, lastname,phone,ddn,fonction FROM $tableName  WHERE fonction='$fonction'";
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
    public static function selectEmployeByName($tableName,$conn,$lastname){
    
        $sql = "SELECT id, firstname,lastname ,phone,ddn,fonction FROM $tableName  WHERE lastname='$lastname'";
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

}

?>
