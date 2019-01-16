<style>

    body {
        background-image: url("https://cdn.pixabay.com/photo/2017/11/01/17/58/sunset-2908862_960_720.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        font-size: 21px;
    }
    input, label {
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
    }

</style>

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




    function affichage()
    {
        GLOBAL $con ;
        GLOBAL $id ;

        $id = (isset($_GET['id'])? $_GET['id'] : null);
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT * from hiking where id = '$id'";

        $result = $con->query($sql);

        while ($row = $result->fetch_assoc()){

            $name = $row['name'] ;
            $difficulty = $row['difficulty'];
            $distance = $row['distance'];
            $duration = $row['duration'];
            $denivle = $row['height_difference'];

            GLOBAL $name ;
            GLOBAL $distance ;
            GLOBAL $difficulty ;
            GLOBAL $duration ;
            GLOBAL $denivle ;


            ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Ajouter une randonnée</title>
            <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
        </head>


        <body>
        <a href="read.php">Liste des données</a>
        <a href="create.php">Créer une rando.</a>
        <h1>Ajouter</h1>
        <form action="" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="<?= $row['name']; ?>">
            </div>

            <div>
                <label for="difficulty">Difficulté</label>
                <select name="difficulty">
                    <option selected="selected"><?= $row['difficulty']; ?></option>
                    <option value="très facile">Très facile</option>
                    <option value="facile">Facile</option>
                    <option value="moyen">Moyen</option>
                    <option value="difficile">Difficile</option>
                    <option value="très difficile">Très difficile</option>
                </select>
            </div>

            <div>
                <label for="distance">Distance</label>
                <input type="text" name="distance" value="<?= $row['distance']; ?>">
            </div>
            <div>
                <label for="duration">Durée</label>
                <input type="duration" name="duration" value="<?= $row['duration']; ?>">
            </div>
            <div>
                <label for="height_difference">Dénivelé</label>
                <input type="text" name="height_difference" value="<?= $row['height_difference'] ?>">
            </div>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" name="button">Envoyer</button>
        </form>
        </body>
        </html>
        <?php
    }

    }

    affichage() ;


/* $maj = "UPDATE hiking  SET  `name` , `difficulty` ,`distance`  ,`duration` ,`height_difference` " ;

$testing = $con->prepare($maj);
$testing->bind_param("ssisi", $name, $difficulty, $distance, $duration, $height_difference);
$testing->execute() ;
$testing->close() ;

*/

    function update() {

        GLOBAL $con ;

     if(isset($_POST['name']) and isset($_POST['difficulty']) and isset($_POST['distance']) and isset($_POST['duration']) and isset($_POST['height_difference']))
     {
        $id = $_POST['id'];
        $name = $_POST['name'] ;
        $difficulty = $_POST['difficulty'];
        $distance = $_POST['distance'];
        $duration = $_POST['duration'];
        $denivle = $_POST['height_difference'];


        $error = "UPDATE hiking 
                  SET `name`= '$name', `difficulty`= '$difficulty' ,`distance`= '$distance' , `duration`= '$duration' , `height_difference`='$denivle'  
                  WHERE id= '$id'" ;

        $con->query($error);

        echo $error ;

        echo '<a href="read.php">See List</a>';

    }

 }

        update();



    ?>



