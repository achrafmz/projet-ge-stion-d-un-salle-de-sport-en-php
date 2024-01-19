<?php

class reservation{

public $id;
public $name;
public $email;
public $res_date;
public $reg_date; 

public $msg; 
public $idCampus;

public static $errorMsg = "";

public static $successMsg="";


public function __construct($name,$email,$res_date,$idCampus){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->name = $name;
    $this->email = $email;
    $this->res_date = $res_date;
    $this->idCampus=$idCampus;

}

public function insertClient($tableName, $conn){
    $sql = "INSERT INTO $tableName (name, email, res_date, idcampus) VALUES ('$this->name', '$this->email', '$this->res_date', '$this->idCampus')";
    
    if (mysqli_query($conn, $sql)) {
        self::$successMsg = "New record created successfully";
    } else {
        self::$errorMsg = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

public static function  selectAllClients($tableName,$conn){

//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id, name, email,res_date,idcampus FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    }

}

static function selectClientById($tableName,$conn,$id){
    //select a client by id, and return the row result
    $sql = "SELECT name, email,res_date FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}


static function deleteClient($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:adminreservation.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }


    public static function selectClientByCampusId($tableName,$conn,$idCampus){
    
        $sql = "SELECT id, name, email,res_date,idcampus FROM $tableName  WHERE idcampus='$idCampus'";
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
    public static function selectClientById1($tableName,$conn,$id){
    
        $sql = "SELECT id, name, email,res_date,idcampus FROM $tableName  WHERE id='$id'";
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
