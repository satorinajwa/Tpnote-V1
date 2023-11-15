<?php
$servername="localhost";
$username="root";
$password="";
$dbname="Banque";

try{
    $cn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo"Error cnx :" . $ex->getMessage();
}


?>