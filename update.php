<?php include ("function.php");?>

<!doctype html>

<html>

<?php include("head.php") ?>



<body>

<?php

if (isset($_SESSION['user_kår'])){

//get user data

$id = $_GET['id']; // kolla om ID tilhör den kår som är inloggad









$sql = "SELECT * FROM  `deltagare` WHERE  `ID` = $id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row

    while($row = $result->fetch_assoc()) {

        

        $kar = $row['kår'];

		$fnamn = $row['förnamn'];

		$enamn = $row['efternamn'];

		$bild = $row['bild'];

		$avdelning = $row['avdelning'];

		$tshirt = $row['tröjstorlek'];

		$speckostSQL = $row['speckost'];

		$sjuk = $row['sjukdomar'];

		$övrigt = $row['övrigt'];

    }

} else {

    echo "0 results";

}

if (($kar == $_SESSION['user_kår']) OR ($_SESSION['user_lvl'] >= 2) ){









	//bearbeta lite värden

	//avdelning

	

	// tshirt




	/*----------------------Bild----------------------*/

	if($bild =="ja"){

		$bild_ja = "checked";

		$bild_nej = "";

	}else{

		$bild_ja = "";

		$bild_nej = "checked";

	}



	$sjuk = str_replace("`", "", $sjuk);

	$övrigt = str_replace("`", "", $övrigt);



    $date = date('Ymd');

    //$last_day = "20170520"; // ------------------------------------------------SIATA ANMÄLNIGS DAG-----------------------------------------

    if ($date < $last_day){

        $action = 'action="update_parse.php"';

        $disabled = false;

    }else{

        $action = 'action="to_late.php"';

        $disabled = true;

    }

    



	?>



	<div id="sitecontainer">

		<?php headern(); ?>

	    <h1><?php echo $fnamn; ?></h1>


	    <div class="deltagare">
		    <form id="nydeltagare" name="nydeltagare" method="post" <?php echo $action; ?> >

		    	

		        

		        <label class="input" for="Förnamn">Förnamn*:</label>

		        <input class="input" <?php if($disabled){ echo "disabled";} ?> required="required" type="text" name="Förnamn" id="textfield" value="<?php echo $fnamn ?>">

		        

		        

		        <label class="input" for="Efternamn">Efternamn*:</label>

		        <input class="input" <?php if($disabled){ echo "disabled";} ?> required="required" type="text" name="Efternamn" id="textfield2" value="<?php echo $enamn ?>">

		        <?php 
		        	printAldersgrupper($disabled, $avdelning); 
					printTshirts($disabled, $tshirt); 
	            	printSpeckost($disabled, explode(", ", $speckostSQL));
	  		    ?>
		            

		        <label class="input full" for="Sjukdomar">Sjukdomar/andra allergier:</label>

		        <textarea class="input" <?php if($disabled){ echo "disabled";} ?> name="Sjukdomar" id="textarea2"><?php echo $sjuk ?></textarea>

		                

		        <label class="input full" for="Övriginfo">Övrig info:</label>

		        <textarea class="input" <?php if($disabled){ echo "disabled";} ?> name="Övriginfo" id="textarea" ><?php echo $övrigt ?></textarea>



		        <label class="input" for="bild" >Får vara med på bild: </label>

	        	<div class="input"><input <?php if($disabled){ echo "disabled";} ?> type="radio" value="ja" <?php echo $bild_ja;?> name="bild"> Ja  &nbsp; <input <?php if($disabled){ echo "disabled";} ?> type="radio" <?php echo $bild_nej;?> value="nej" name="bild"> Nej </div>
	        	<div class="actions">
			    	<input type="button" name="btnreturn" id="btnreturn" class="check return" value="Tillbaka">
			        <input type="button" <?php if($disabled){ echo "disabled";} ?> name="remove" id="remove" value="Avregistrera">
			    	<input type="submit" <?php if($disabled){ echo "disabled";} ?> name="btnSubmit" id="btnSubmit" class="check" value="Spara">
		        </div>

		        <input type="hidden" <?php if($disabled){ echo "disabled";} ?> value="<?php echo $id ?>" name ="id">

		        <div id="info">

		        	<p>Obligatoriska fält är makerade med *</p>

		        </div>

		    </form>
		</div>

	    <?php 

	    	footern();

	    ?>

	</div>

	<?php

	}

}else{

		?>

	<div id="sitecontainer">

		<?php headern(); ?>

		<h1>Deltagare</h1>

		<div class="deltagare">

			

            <p> Du är inte <a href="login.php"> inloggad</a> för tillfälet eller så har något annat gått fel</p>

        </div>

        <?php footern();?>

	</div>

	<?php

}



?>

</body>

</html>