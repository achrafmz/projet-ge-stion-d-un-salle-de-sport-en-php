<?php

//include the connection file
include('connection.php');

//create an instance of Connection class
$connection = new Connection();

//call the createDatabase methods to create database "chap4Db"
$connection->createDatabase('powerdata');

$query0 = "
CREATE TABLE campuses (
    id VARCHAR(20) PRIMARY KEY,
    namec VARCHAR(30) NOT NULL
    )
";

$query = "
CREATE TABLE reservation (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    res_date DATE NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    idcampus VARCHAR(20) NOT NULL,
    FOREIGN KEY (idcampus) REFERENCES campuses(id)
)
";
$querye = "
CREATE TABLE contact (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    message VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$query1 = "
CREATE TABLE client (
id INT(6)   PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(50) NOT NULL,
phone VARCHAR(50) NOT NULL,
ddn DATE NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)
";
$querye0 = "
CREATE TABLE fonctionnalite (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    namef VARCHAR(30) NOT NULL
    )
";
$querye1 = "
CREATE TABLE employe (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    ddn DATE NOT NULL,
    fonction INT(6) UNSIGNED,
    FOREIGN KEY (fonction) REFERENCES fonctionnalite(id)
);
";
$connection->selectDatabase('powerdata');   

//call the createTable method to create table with the $query

$connection->createTable($query);

$connection->createTable($query0);

?>
