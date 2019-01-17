<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <style>
      body {
          background-image: url("https://static1.squarespace.com/static/58352289197aeac1e8c8ce6d/t/59fde6bcf9619a4291805ef7/1509811905873/hiking-gear-checklist");
          background-repeat: no-repeat;
          background-size: cover;
          font-size: 21px;
      }
      table, tr , td , th {
          border : 1px solid black ;
          text-align: center;
          background-color:  rgba(212, 119, 46, 0.6);
      }
      table {
          margin-left : 300px ;
      }

      h1 {
          text-align:  center;
          border: 1px outset black;
          background-color: white;
      }


  </style>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
      <!-- Afficher la liste des randonnées -->
        <?php

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

        $dis = "SELECT * 
                FROM hiking ";


        $connexion = $con -> query($dis) ;


        echo '<tr><th>nom :</th><th>difficulté :</th><th>distance : </th><th>durée: </th><th>dénivelé :</th></tr>' ;

        while($row = $connexion-> fetch_assoc()) {

            $merdum = $row['id'] ;


            echo '<tr><td>' .

                 '<a target="_blank" href="update.php?id='.$merdum.'">' .

                  $row['name'] .'</a>'. '</td><td>' . $row['difficulty'] .

                 '</td><td>' . $row['distance'] .'</td><td>' . $row['duration'] .

                '</td><td>' . $row['height_difference'] .'<a href="delete.php?id= '. $merdum .'">Delete</a>' .'</td></tr>' ;
        }




        ?>




    </table>
  </body>
</html>
