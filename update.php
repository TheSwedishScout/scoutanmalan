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

        $disabled = '';

    }else{

        $action = 'action="to_late.php"';

        $disabled = 'disabled';

    }

    



	?>



	<div id="sitecontainer">

		<?php headern(); ?>

	    <h1><?php echo $fnamn; ?></h1>



	    <form id="nydeltagare" name="nydeltagare" method="post" <?php echo $action; ?> >

	    	

	        

	        <label class="input" for="Förnamn">Förnamn*:</label>

	        <input class="input" <?php echo $disabled; ?> required="required" type="text" name="Förnamn" id="textfield" value="<?php echo $fnamn ?>">

	        

	        

	        <label class="input" for="Efternamn">Efternamn*:</label>

	        <input class="input" <?php echo $disabled; ?> required="required" type="text" name="Efternamn" id="textfield2" value="<?php echo $enamn ?>">



	        <label class="input"  for="avdelning">Avdelning*:</label>

	        <?php printAldersgrupper($avdelning) ?>

	        

	        <label class="input" for="t-shirt">Tröjstorlek*:</label>

	         <?php printTshirts(); 
            	printSpeckost(explode(", ", $speckostSQL));
  		    ?>
	            

	        <label class="input full" for="Sjukdomar">Sjukdomar/andra allergier:</label>

	        <textarea class="input" <?php echo $disabled; ?> name="Sjukdomar" id="textarea2"><?php echo $sjuk ?></textarea>

	                

	        <label class="input full" for="Övriginfo">Övrig info:</label>

	        <textarea class="input" <?php echo $disabled; ?> name="Övriginfo" id="textarea" ><?php echo $övrigt ?></textarea>



	        <label class="input" for="bild" >Får vara med på bild: </label>

        	<div class="input"><input <?php echo $disabled; ?> type="radio" value="ja" <?php echo $bild_ja;?> name="bild"> Ja  &nbsp; <input <?php echo $disabled; ?> type="radio" <?php echo $bild_nej;?> value="nej" name="bild"> Nej </div>

	    	<input type="submit" <?php echo $disabled; ?> name="btnSubmit" id="btnSubmit" class="check" value="Spara">

	        <input type="button" <?php echo $disabled; ?> name="remove" id="remove" value="radera">

	        <input type="hidden" <?php echo $disabled; ?> value="<?php echo $id ?>" name ="id">

	        <div id="info">

	        	<p>Obligatoriska fält är makerade med *</p>

	        </div>

	    </form>

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