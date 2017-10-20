<?php
$hostname = "127.0.0.1";
$username = "root";
$password="";
$dbname="mydb";
try{
    $connectionId = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
}catch(Exception $ex){
    echo "Cannot reach database";
}
?>