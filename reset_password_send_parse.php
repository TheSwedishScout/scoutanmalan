<?php
include ("function.php");
$steps = 0;
/*password reset parse*/
if (isset($_POST['username'])){
	$username = test_input($_POST['username']);
    $sql = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$username'";
    

	$result = $conn->query($sql);
	$steps ++;
        

    if ($result->num_rows == 1) {
        // get varibals to credentials for email and database
        $row = $result->fetch_assoc();
		var_dump($row);
        
        $username_DB = $row['username'];
        $email_DB = $row['email'];
        $time = date('U');
        $time = strtotime("+2 day", $time); // lägger till 2 dagar på tiden så att man har på sig till dess att nollställa lösenordet
        $control = random_string(5);
        $hash = md5($username_DB); // Link this as identifycation for $_get
        
		

		$steps ++;
        $sql2 = "INSERT INTO users_password_reset (time, email, username, control) VALUES ('$time', '$email_DB', '$username_DB', '$control')";
        if ($conn->query($sql2) === TRUE) {

		    echo "New record created successfully";
		    $subject = "Nytt lösenord Läge&reg;2015";
		    //Send email to users registreted email and add row to users_password_reset whith information
		    // message
			$message =  "
			<html>
				<head>
				  <title>$subject</title>
				</head>
				<body>
				  <h1>Nytt lösenord</h1>
				  <p>Du har förfrågat nytt lösenord för $username_DB</p>
				  <p>$control</p>
				  <p>Följ länken och ange koden ovan <a href='http://scouten.se/lager2016/password_reset.php?very=$hash'>http://scouten.se/lager2016/password_reset.php?very=$hash</a></p>
				</body>
			</html>
			";
			

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			// Additional headers
			$headers .= "To: $username_DB <$email_DB>" . "\r\n";
			$headers .= 'From: Anmälan <?php echo $lägerNamn; ?> <no-replay@scouten.se>' . "\r\n";
			

		    mail($email_DB, $subject, $message, $headers);
			$steps ++;
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
    }
    
}
?>
<!doctype html>
<html>
<?php include("head.php") ?>
<body>

    <div id="sitecontainer">
    <?php headern(); ?>
		<h1>Anmälnings sidan för läge&reg;2016</h1>
        <div class="deltagare">
        	<?php
			if($steps == 3){
				?>
				<h2>Mail har blivigt skickat</h2>
				<p>Var god och kolla din mail för vidare instruktioner</p>
				<?php
			}else{
				echo "<h2>Något har gått fel</h2>";
				?>
				<p>Kolla följande saker:</p>
				<ul>
					<li>
						Är det det namnet du registrerade.
					</li>
					<li>
						Testa med mail adressen du registrerade.
					</li>
					<li>
						Testa alla stavfels möjligheter.
					</li>
					<li>
						Skicka ett mail till scout@timje.se
					</li>
				</ul>
				<?php
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

				// Additional headers
				$headers .= 'From: Fel <?php echo $lägerNamn; ?> <no-replay@scouten.se>' . "\r\n";
				mail('max@timje.se', 'Fel anmälan', "det ser ut att gå fel för $username när han/hon försökte byta lösenord kolla igenom del $steps", $headers);
			}
			?>
        </div>
        <?php
        footern()
        ?>
    </div>
</body>
</html>