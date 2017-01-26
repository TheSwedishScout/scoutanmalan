<?php
include ("function.php");
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

			
        <?php
        if (isset($_POST['password'])){
			$password = test_input($_POST['password']);
			$password2 = test_input($_POST['password2']);
			if ((isset($_SESSION['very'])) || ($password2 == $password)){
				$user = $_SESSION['very'];
				$options = [
		                'cost' => 8
		            ];

		            $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

				    unset($password);
				    unset($password2);

					$sql2 = "UPDATE `users` SET `password`='$password_hashed' WHERE `username` = '$user'";

					if ($conn->query($sql2) === TRUE) {
					    echo "Ditt lösenord är uppdaterat!";
					    $password_update= "password=updated";
					} else {
					    echo "Error updating record: " . $conn->error;
					}
			}
		}
        ?>

        </div>

        <?php

        footern()

        ?>

    </div>

</body>

</html>