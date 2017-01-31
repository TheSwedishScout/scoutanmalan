<?php
include ("function.php");
?>
<!doctype html>

<html>

<?php include("head.php") ?>


<body>



    <div id="sitecontainer">

    <?php headern(); ?>

		<h1>Nytt lösenord <?php echo $lägerNamn; ?></h1>

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