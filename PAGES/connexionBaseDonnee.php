<?php
try {
$baseDonnee = new PDO("mysql:host=localhost;dbname=greenWorks;charset=utf8","root","",
[PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,PDO::ATTR_AUTOCOMMIT]);
}
catch(Exception $e){
 die("Erreur :".$e->getMessage());
}
?>