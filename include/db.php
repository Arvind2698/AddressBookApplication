<?php

$servername = "localhost";
$dbname="addressbook";
$username = "root";
$password = "";
define("servername","localhost",);
define("dbname","addressbook",);
define("username","root",);
define("password","",);

$connection=mysqli_connect(servername,username,password,dbname);

if(!$connection){
    die("connection failed" . mysqli_connect_error());
}


