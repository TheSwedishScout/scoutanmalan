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

		$veg = $row['vegetarian'];

		$gluten = $row['glutenintolerant'];

		$laktos = $row['laktosintolerant'];

		$mjölk = $row['mjölkfritt'];

		$annat = $row['annat'];

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

	$s110 = "";

	$s130 = "";

	$s150 = "";

	$xs = "";

	$s = "";

	$m = "";

	$l = "";

	$xl = "";

	$xxl = "";

	$xxxl = "";

	$xxxxl = "";

	switch($tshirt){

		case "110/120":

			$s110 = "selected ='selected'";

			break;

		case "130/140":

			$s130 = "selected ='selected'";

			break;

		case "150/160":

			$s150 = "selected ='selected'";

			break;

		case "XS":

			$xs = "selected ='selected'";

			break;

		case "S":

			$s = "selected ='selected'";

			break;

		case "M":

			$m = "selected ='selected'";

			break;

		case "L":

			$l = "selected ='selected'";

			break;

		case "XL":

			$xl = "selected ='selected'";

			break;

		case "XXL":

			$xxl = "selected ='selected'";

			break;

		case "XXXL":

			$xxxl = "selected ='selected'";

			break;

		case "XXXXL":

			$xxxxl = "selected ='selected'";

			break;

	}

	// special kost

	/*

		$veg = $row['vegetarian'];

		$gluten = $row['glutenintolerant'];

		$mjölk = $row['mjölkfritt'];

		$annat = $row['annat'];

	*/

	if ($veg == 'ja'){

		$checkveg = "checked";

	}else{

		$checkveg = "";

	}

	if ($gluten == 'ja'){

		$checkgluten = "checked";

	}else{

		$checkgluten = "";

	}

	if ($laktos == 'ja'){

		$checklaktos = "checked";

	}else{

		$checklaktos = "";

	}

	if ($mjölk == 'ja'){

		$checkmjölk = "checked";

	}else{

		$checkmjölk = "";

	}

	if ($annat == 'ja'){

		$checkannat = "checked";

	}else{

		$checkannat = "";

	}

	//trim "'" from string





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

    $last_day = "20170520"; // ------------------------------------------------SIATA ANMÄLNIGS DAG-----------------------------------------

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
	        <!--
	        <select class="input" <?php echo $disabled; ?> required  name="avdelning">

	        	<option <?php echo $spårare; ?> value="Spårare">Spårare (10-13 juli)</option>

	          	<option <?php echo $upptackare; ?>value="Upptäckare">Upptäckare (10-16 juli) </option> 

	          	<option <?php echo $aventyrare; ?>value="Äventyrare">Äventyrare (10-16 juli)</option>

	          	<option <?php echo $utmanare; ?> value="Utmanare">Utmanare (10-16 juli)</option>

	          	<option <?php echo $ledare; ?> value="Ledare">Ledare (10-16 juli)</option>

	          	<option <?php echo $ledare_delad; ?> value="Ledare_delad">Ledare (delad)</option>

	            <option <?php echo $ledareSpårare; ?> value="Ledare (Spårare)">Ledare (Spårare) (10-13 juli)</option>

	            <option <?php echo $ledarbarn; ?> value="Ledarbarn">ledarbarn (10-16 juli)</option>

	            <option value="---" disabled>-------------------------</option>

	            <option <?php echo $funk; ?> value="Funktionär">funktionär (09-17 juli)</option> 

	        </select>
			-->
	        

	        <label class="input" for="t-shirt">Tröjstorlek*:</label>

	        <select class="input" <?php echo $disabled; ?> required  name="t-shirt">

	            <option <?php echo $s110; ?> value="110/120">110/120cl</option>

	            <option <?php echo $s130; ?> value="130/140">130/140cl</option>

                <option <?php echo $s150; ?> value="150/160">150/160cl</option>

                <option value="---" disabled>--Unisex--</option>

	            <option <?php echo $xs; ?> value="XS">XS</option>

	            <option <?php echo $s; ?> value="S">S</option>

	            <option <?php echo $m; ?> value="M">M</option>

	            <option <?php echo $l; ?> value="L">L</option>

	            <option <?php echo $xl; ?> value="XL">XL</option>

	            <option <?php echo $xxl; ?> value="XXL">XXL</option>

	            <option <?php echo $xxxl; ?> value="XXXL">XXXL</option>

                <option <?php echo $xxxxl; ?> value="XXXXL">XXXXL</option>

                

	        </select>

	        

	        <label class="input" for="Specialkost">Vegetarian</label>

	        <input <?php echo $checkveg ?> <?php echo $disabled; ?> class="input" type="checkbox" name="Specialkost[0]" value="Vegetarian"> <!--checked-->

	        <label class="input" for="Specialkost">Glutenintolerant</label>

	        <input <?php echo $checkgluten ?> <?php echo $disabled; ?> class="input" type="checkbox" name="Specialkost[1]" value="Glutenintolerant">



	        <label class="input" for="Specialkost">Laktosintolerant</label>

	        <input <?php echo $checklaktos ?> <?php echo $disabled; ?> class="input" type="checkbox" name="Specialkost[2]" value="Laktosintolerant">

		



	        <label class="input" for="Specialkost">Mjölkfritt</label>

	        <input <?php echo $checkmjölk ?> <?php echo $disabled; ?> class="input" type="checkbox" name="Specialkost[3]" value="Mjölkfritt"> 



	        <label class="input" for="Specialkost">Annat (kontakta)</label>

	        <input <?php echo $checkannat ?> <?php echo $disabled; ?> class="input" type="checkbox" id="annat" name="Specialkost[4]" value="Annat"> <!-- Allert "Kontakta Annica Wetter Nilsson på telefon och diskutera en lämplig lösning. Var då beredd på att vi kan vilja ha läkarintyg på att specialkost krävs.  -->

	            

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