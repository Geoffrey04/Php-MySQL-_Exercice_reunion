<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<style>

    body {
        background-image: url("https://cdn.pixabay.com/photo/2017/11/01/17/58/sunset-2908862_960_720.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        font-size: 21px;
    }
    input, label  {

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


    if (isset($_POST['name'])) { $name = $_POST['name']; }
    if (isset($_POST['difficulty'])) { $difficulty = $_POST['difficulty']; }
    if (isset($_POST['distance'])) { $distance = $_POST['distance']; }
    if (isset($_POST['duration'])) { $duration = $_POST['duration']; }
    if (isset($_POST['height_difference'])) { $height_difference = $_POST['height_difference']; }

   // $name = $_POST['name'] ;
    //$difficulty = $_POST['difficulty'] ;
   // $distance = $_POST['distance'];
    //$duration = $_POST['duration'];
    // $height_difference =  $_POST['height_difference'];
    // print_r($_POST);



    $new_data = "INSERT INTO `hiking` ( `name` , `difficulty` ,`distance`  ,`duration` ,`height_difference`) 
                 VALUES ( ? , ? , ? , ? , ? )";

    if(isset($name) != '' && isset($difficulty) != '' && isset($distance) != '' && isset($duration) != '' && isset($height_difference) != '')
    {



        $test = $con->prepare($new_data);
        $test->bind_param("ssisi", $name, $difficulty, $distance, $duration, $height_difference);



        $test->execute();
        echo "GIVE ME VALUE ! PLEASE ! JUST ONE !" ;
        // var_dump($test);
        $test->close();


    }
        else {

            echo "<div id='textuel'>"."Entrer une valeur"."</div>" ;

    }





    ?>

<body>
	<a href="read.php">Liste des données</a>

	<h1>Ajouter</h1>
	<form action="create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
            <div id="textuel"></div>
</body>
</html>

