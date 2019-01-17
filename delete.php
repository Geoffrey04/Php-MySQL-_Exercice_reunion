<?php
/**** Supprimer une randonnée ****/

include "check_login.php" ;
echo "<a href='logout.php' class='logout'>Déconnexion</a>" ;

$servername = 'localhost' ;
$username = "root" ;
$password = '';
$dbname = "reunion_island";


// créer une nouvelle connexion :

$con = new mysqli($servername, $username, $password) ;

if($con -> connect_error) {

    die("Connection failed: " . $con->connect_error);


} else {

    $con -> select_db($dbname) ;

}

    $carapute = $_GET['id'] ;


$sql_error = "DELETE  FROM hiking WHERE id= '$carapute '";

$con->query($sql_error);








header("Location:read.php");