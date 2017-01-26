<?php include ("function.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Anmälan läge&reg;2016</title>

<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="styles/main.css" />
<link rel="shortcut icon" href="images/lägerloggo-smal.png"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/my_js.js"></script>
</head>

<body>

    <div id="sitecontainer">
    <?php headern(); ?>
		<h1>Mina uppgifter</h1>

		<?php
		if (isset($_SESSION['user_id'])){
            if (isset($_GET['password']) OR isset($_GET['email']) OR isset($_GET['phone'])){
            	$status = "";
                if (isset($_GET['password'])){
                	if($_GET['password'] === "updated") {
	                    $status .= "<li>Lösenord</li>";
	                }else{
	                    $status .= "annat";
	                }
            	}
                if (isset($_GET['email'])){
	                if ($_GET['email'] === "updated") {
	                    $status .= "<li>e-mail adress</li>";
	                }else{
	                    $status .= "annat";
	                }
            	}
                if (isset($_GET['phone']) ){
                	if ($_GET['phone'] === "updated") {
	                    $status .= "<li>Telefonnummer</li>";
	                }else{
	                    $status .= "annat";
	                }
	            }
                ?>
                    <div id="popup">
                        <div id="close_popup">X</div>
                        <p>Vi har uppdaterat ditt:</ p>
                        <ul>
                        	<?php echo $status;?>
                        </ul>
                        
                    </div>
                <?php
            }
        ?>

		<div class="deltagare">

		<?php
			$inkår = $_SESSION['user_kår'];

			$sql = "SELECT * FROM `users` WHERE `kår` = '$inkår' LIMIT 1; ";
			$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$namn =$row['username']; 
						$kår = $row['kår'];
						$telefon = $row['telefon'];
						$email = $row['email'];

					}
				}
		?>
			<div id="nydeltagare"> 
				<label class="input">Namn:</label><label class="input"> <?php echo $namn; ?></label>
				<label class="input">Kår:</label><label class="input"> <?php echo $kår; ?></label>
				
				<form method="POST" action="edit_detail.php">
					<label class="input">Lösenord: </label>
					<input class="input" type="password" name="password" placeholder="lämna tomt för att inte byta" />
					<label class="input">Gammalt lösenord: </label>
					<input class="input" type="password" name="password_old" placeholder="lämna tomt för att inte byta" />

					<label class="input">e-mail: </label>
					<input class="input" type="email" name="email" value="<?php echo $email; ?>"/>

					<label class="input">Telefon: </label>
					<input class="input" type="number" name="phone" value="<?php echo $telefon; ?>"/>
					
					<input type="submit" id="Submit" value="Spara">
				</form>
			</div>



		<?php
			$sql2 = "SELECT `förnamn`,`efternamn` FROM `deltagare` WHERE `kår` = '$inkår' ORDER BY `deltagare`.`förnamn` DESC";
			$result2 = $conn->query($sql2);

			$namnen = [];
				if ($result2->num_rows > 0) {
					while($row2 = $result2->fetch_assoc()) {
						$namnen[] = $row2['förnamn']. " ". $row2['efternamn'];

					}
				}

		?>
			<br/>
			<a href="funktioner.php"> Instruktioner lägeranmälan</a>
			<br/>
			<h3>Dina scouter:</h3>
			<?php
				foreach ($namnen as $deltagare) {
					echo "<p>$deltagare</p>";
				}
			?>




			
        </div>
        <?php
    	}else{
    		header('location: login.php');
			exit;
    	}
        footern();
        ?>
    </div>
</body>
</html>