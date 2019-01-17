<?php

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
$login_valide = (isset($_POST['username'])? $_POST['username']: NULL) ;
$pwd_valide = (isset($_POST['password']) ? $_POST['password'] : NULL)  ;


$pwd_valide = sha1($pwd_valide);

$verif = "SELECT * 
          FROM `user`
          WHERE username = '$login_valide' and password = '$pwd_valide' " ;


$var = $con->query($verif) ;

$row = $var->fetch_assoc() ;



    $login_valide = $row['username'];
    $pwd_valide = $row['password'];






    if (isset($_POST['username']) && isset($_POST['password'])) {

        if ($login_valide == $_POST['username'] && $pwd_valide == sha1($_POST['password'])  ){

            session_start();

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            header('location:read.php');
        }


        if ($_POST['username'] != $login_valide && $_POST['password'] != $pwd_valide) {


            echo "Nom d'utilisateur ou mot de passe incorrect ! T'es nul ! ";

        }


};




?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <style>

      body {
          background-image: url("https://static1.squarespace.com/static/58352289197aeac1e8c8ce6d/t/59fde6bcf9619a4291805ef7/1509811905873/hiking-gear-checklist");
          background-repeat: no-repeat;
          background-size: cover;
          font-size: 21px;
      }
      input, label,  {
          text-align: center;

      }

      h1 {
          text-align:  center;
          border: 1px outset black;
          background-color: white;
      }


      form {
          text-align: center;
          color : coral ;
          margin-top: 10%;
      }


  </style>
  <body>

    <form action="" method="post">
      <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
      </div>
      <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
      </div>
      <div>
        <button type="submit" name="button">Se connecter</button>
      </div>
    </form>
  </body>
</html>
