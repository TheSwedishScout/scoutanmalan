<?php
include ("function.php");
$steps = 0;
/*password reset parse*/
if (isset($_SESSION["very"]) AND isset($_POST["kod"])){
	$kod = test_input($_POST["kod"]);
	$sql = "SELECT * FROM `users_password_reset` WHERE `control` = '$kod'";
	//SELECT * FROM `users_password_reset` WHERE `control` LIKE 'Ic96z'
	$result = $conn->query($sql);
	$steps ++;
	
    if ($result->num_rows == 1) {
        // get varibals to credentials for email and database
        $row = $result->fetch_assoc();
        $steps ++;
        
        //time, email, username, control
        //om date (u) är < time (db) så forsätt
        $date_u = date('U');
        if ($row['time'] > $date_u){ // date i databasen är tiden tillagt med 2 dygn från förfrågan
	        //Kolla om användarnamnet är samma som session very i md5 hash
	        $username = $row['username'];
	        $steps ++;

	        if($_SESSION['very'] == md5($username)){
	        	$_SESSION['very'] = $username;

	        	$steps ++; // om steps = 4 så är allt okej och har gått igenom
	        // spara användarnamnet i session very
	        // ge två text rutor för användaren att skriva i sitt lösenord på nytt 2 ggr

	        //om något får fel så skriv ut "något har blivit fel var god att testa igen"
	        }
        }
    }
}
?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Anmälan läge&reg;2016</title>

<meta name="viewport" content="width=device-width"/>

<link rel="stylesheet" type="text/css" href="styles/main.css" />

<link rel="shortcut icon" href="images/lägerloggo-smal.png"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="js/my_js.js"></script>

</head>


<body>



    <div id="sitecontainer">

    <?php headern(); ?>

		<h1>Nytt lösenord läge&reg;2016</h1>

        <div class="deltagare">

			

			<!--be om koden som de fick via mail och sean sök upp det i data basen. Kolla om användarnamnet och hashen de linkades med stämmer överens.

			skriv in nytt lösenord och uppdatera lösenordet vid användaren. -->

			<?php
				if ($steps == 4){
					
			?>

					<form method="POST" action="password_new_parse.php" id="nydeltagare" enctype="multipart/form-data">

						<label class="input" for="password">Lösenord:</label>

						<input class="input" required type="text" name="password">

						<!--java script för att se om de är lika-->

						<label class="input" for="password2">Repetera:</label>

						<input class="input" required type="text" name="password2">

						<input type="submit" name="btnSubmit" id="btnSubmit" value="Skicka">

						<div id="info">

							<p>Alla fälten behövs fyllas i</p>

						</div>

					</form>
			<?php 
				}else{
			?>
					<p>Något stämmer inte.</p>
			<?php
				echo $steps;
				}
			?>

        </div>

        <?php

        footern()

        ?>

    </div>

</body>

</html>