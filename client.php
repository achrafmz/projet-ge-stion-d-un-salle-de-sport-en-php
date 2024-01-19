<?php

class Client{

public $id;
public $firstname;
public $lastname;
public $phone;
public $ddn;
public $reg_date; 


public static $errorMssg = "";

public static $successMssg="";


public function __construct($firstname,$lastname,$phone,$ddn){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->phone = $phone;
    $this->ddn = $ddn;

}

public function insertClient($tableName,$conn){

//insert a client in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (firstname, lastname, phone,ddn)
VALUES ('$this->firstname', '$this->lastname', '$this->phone','$this->ddn')";
if (mysqli_query($conn, $sql)) {
self::$successMssg= "client has been added";

}else   {
    self::$errorMssg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}


public static function  selectAllClients($tableName,$conn){

//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id, firstname, lastname,phone,ddn FROM $tableName ";
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





static function deleteClient($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMssg= "Record deleted successfully";
    header("Location:adminclient.php");
} else {
    self::$errorMssg= "Error deleting record: " . mysqli_error($conn);
}

  
    }
    static function updateClient($client,$tableName,$conn,$id){
        //update a client of $id, with the values of $client in parameter
        //and send the user to read.php
        $sql = "UPDATE $tableName SET firstname='$client->firstname',lastname='$client->lastname',phone='$client->phone',ddn='$client->ddn' WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
    header("Location:adminclient.php");
            } else {
                self::$errorMsg= "Error updating record: " . mysqli_error($conn);
            }
    
    
    }

    public static function selectClientByName($tableName,$conn,$lastname){

       
        $sql = "SELECT id, firstname, lastname,phone,ddn FROM $tableName  WHERE lastname='$lastname'";
        
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
        $sql = "SELECT firstname, lastname,phone,ddn FROM $tableName  WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        
        }
        return $row;
    }
}

?>
