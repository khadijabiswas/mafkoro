<?php 

$db = mysqli_connect("localhost","root","","mafkoro");

if(!$db){
 
header('location: ../error/404.php');

}


?>