<?php include ("function.php");?>

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

	<?php

		if(!isset($_SESSION['user_kår'])){

		?>

		<h1>Anmäl ny deltagare</h1>

		   <div class="deltagare">

				<p> Du kan inte registrera någon för tillfället. Eller är inte <a href="login.php"> inloggad</a></p>

			</div>  

		<?php

		}else{

		?>



	<h1>Deltagare <?php echo $_SESSION['user_kår']; ?></h1>

	<?php

		$date = date('Ymd');

		//$last_day = "20170520"; // ------------------------------------------------SIATA ANMÄLNIGS DAG-----------------------------------------ÄNDRA!!!!!!!!!!

		if ($date < $last_day){

			$action = 'action="anmalan_parse.php"';

			$disabled = false;

		}else{

			$action = 'action="to_late.php"';

			$disabled = true;

		}

		if (isset($_GET['anmäld']) && ($_GET['anmäld'] === "sparad")){

			?>

				<div id="popup">

					<div id="close_popup">X</div>

					<p>Din anmälan har gått igenom och är sparad.</p>



					

				</div>

			<?php

		}

	?>

	<form id="nydeltagare" name="nydeltagare" method="post" action="anmalan_parse.php" enctype="multipart/form-data">

	

		

		<label class="input" for="Förnamn">Förnamn*:<div class="">Det ser inte rätt ut</div></label>

		<input class="input name" <?php if($disabled){ echo "disabled";} ?> required="required" type="text" name="Förnamn" autofocus placeholder="Erik" id="textfield">

		<label class="input" for="Efternamn">Efternamn*:</label>

		<input <?php if($disabled){ echo "disabled";} ?> class="input name" required="required" type="text" name="Efternamn" placeholder="Svensson" id="textfield2">

		

		<?php 
			printAldersgrupper($disabled);
			printTshirts($disabled); 
			printSpeckost($disabled);
		?>


		<label class="input full" for="Sjukdomar">Sjukdomar/andra allergier:</label>

		<textarea class="input" <?php if($disabled){ echo "disabled";} ?> name="Sjukdomar" id="textarea2" placeholder="Sjukdomar och allergir som är bra för Skjukvård att veta"></textarea>    

		<label class="input full" for="Övriginfo">Övrig info:</label>

		<textarea class="input" <?php if($disabled){ echo "disabled";} ?> name="Övriginfo" placeholder="Information som är bra för andra funktioner än Sjukvård" id="textarea" ></textarea>

		<label class="input" for="bild" >Får vara med på bild: </label>

		<div class="input"><input <?php if($disabled){ echo "disabled";} ?> type="radio" value="ja" checked name="bild"> Ja  &nbsp; <input <?php if($disabled){ echo "disabled";} ?> type="radio" value="nej" name="bild"> Nej </div>

		<input type="submit" <?php if($disabled){ echo "disabled";} ?> name="btnSubmit" id="btnSubmit" class="check" value="Spara">

		<div id="info">

			<p>Obligatoriska fält är makerade med *</p>

		</div>

	</form>

	<?php

	}

	footern();

	?>

</div>

</body>

</html>