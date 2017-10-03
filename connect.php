<?php
session_start() ;
$dbname = "d6795kfmb4700t";
$host ="ec2-54-163-230-219.compute-1.amazonaws.com"  ;
$dbuser= "meifpgajkkqkgf";
$dbpass = "db2417debd1e373c0b465aebbd5dd0c4fb330882d83897289605a5195019a8ff"; 
$conn = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass); 

// Check connection 


$sql = "CREATE TABLE  IF NOT EXISTS members(
UserName VARCHAR(50) NOT NULL ,  
Email VARCHAR(50) NOT NULL ,
Password VARCHAR(50) NOT NULL,
Q1 VARCHAR(50) NOT NULL ,
Q2 VARCHAR(50) NOT NULL ,
Ans1 VARCHAR(50) NOT NULL ,
Ans2 VARCHAR(50) NOT NULL )  " ; 

$conn->query($sql) ;

$sql1 = " CREATE TABLE if not exists chat  (
  
    semail varchar(255) NOT NULL,
    remail varchar(255) NOT NULL ,
    message varchar(255) not null

)" ;

	$conn->query($sql1) ;
?>