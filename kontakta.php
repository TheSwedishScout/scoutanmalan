<?php include ("function.php");?>

<!doctype html>

<html>

<?php include("head.php") ?>



<body>



    <div id="sitecontainer">

    <?php headern(); ?>

		<h1>Kontakt anmälan</h1>

		<div class="deltagare">

			<p>Denna hemsida är skapad av mig <a href="http://www.timje.se">Max Timje</a>. Har du några frågor om funktioner är du välkommen att meddela mig, se kontaktuppgifter nedan. Har du några frågor om var du ska skriva in saker så hänvisar jag dig till första sidan och om frågan inte är löst så kan du kontakta <?php echo $kontaktPersorn; ?> på <?php echo $kontaktMail; ?>.</p>

	        <p>För övriga kontaktuppgifter till lägerledningen se lägrets informations sidor <a href="<?php echo $lägretsSida ?>">Här.</a> </p>

			<h3>e-mail</h3>

			<p>scout(a)timje.se</p>

			<h3>Mobil</h3>

			<p>+46 (0)73 06 41 448</p>

			<h3>facebook</h3>

			<p>Max Timje</p>



			<p>//Max Timje, infogruppen</p>

			<?php
			if(isset($_SESSION['user_kår'])){
				$inkår = $_SESSION['user_kår'];
				$sql = "SELECT email FROM `users` WHERE `kår` = '$inkår' LIMIT 1; ";
				$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$email = $row['email'];
						}
					}
			}
			?>

			<form id="kontakt" action="contact.php" method="POST"> 
				<h4>Skicka ditt medelande</h4>
				<label>Din e-mail:</label>
				<input type="email" name="from" required <?php if (isset($email)){echo "value = '".$email."'" ;} ?> >
				<br>
				<label>Medelande</label>
				<br>
				<textarea name="medelande"></textarea>
				<br>
				<input type="submit" value="Skicka">
			</form>

		</div>



    <?php footern() ?>

    </div>

</body>

</html>