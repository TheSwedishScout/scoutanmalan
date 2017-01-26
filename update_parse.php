<?php include ("function.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Anmälan läge&reg;2016</title>

<link rel="stylesheet" type="text/css" href="styles/main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/my_js.js"></script>
</head>

<body>
<?php

var_dump($_POST);

if (!empty($_POST)){
	
	$kar = "sofia scoutkår";//$_post en hidden som skickar med användarens kår
	
	//obligatoriska fält
	$id = test_input($_POST['id'], $conn);
	
	$fnamn = test_input($_POST["Förnamn"], $conn);
	$enamn = test_input($_POST['Efternamn'], $conn);
	$bild = test_input($_POST['bild'], $conn);
	$avdelning = test_input($_POST['avdelning'], $conn);
	if(!in_array($avdelning, $aldersgrupp)){
		$error = true;
	}
	$tshirt = test_input($_POST['t-shirt'], $conn);
	if(!in_array($tshirt, $tshirts)){
		$error = true;
	}

	
	//inte obligatoriska
	//echo $_POST['Specialkost'][0];
	if ((isset($_POST['Specialkost'][0])) && ($_POST['Specialkost'][0] == "Vegetarian")){
		$veg = "ja";
	}else{
		$veg = "nej";
	}
	if ((isset($_POST['Specialkost'][1])) && ($_POST['Specialkost'][1] == "Glutenintolerant")){
		$gluten = "ja";
	}else{
		$gluten = "nej";
	}
	if ((isset($_POST['Specialkost'][2])) && ($_POST['Specialkost'][2] == "Laktosintolerant")){
		$laktos = "ja";
	}else{
		$laktos = "nej";
	}
	if ((isset($_POST['Specialkost'][3])) && ($_POST['Specialkost'][3] == "Mjölkfritt")){ 
		$mjölk = "ja";
	}else{
		$mjölk = "nej";
	}
	if ((isset($_POST['Specialkost'][4])) && ($_POST['Specialkost'][4] == "Annat")){
		$annat = "ja";
	}else{
		$annat = "nej";
	}
	$Sjukdomar = test_input($_POST['Sjukdomar'], $conn);
	if (!empty($Sjukdomar)){
		$Sjukdomar = "'".$Sjukdomar."'";
	}else{
		$Sjukdomar = "NULL";
	}
	
	$övrigt = test_input($_POST['Övriginfo'], $conn);
	if (!empty($övrigt)){
		$övrigt = "'".$övrigt."'";
	}
	else{			
		$övrigt = "NULL";
	}
	
	
	if (!$error) {
		
	
		$sql= "UPDATE deltagare SET förnamn='$fnamn', efternamn='$enamn', bild='$bild', avdelning='$avdelning', tröjstorlek='$tshirt', vegetarian='$veg', glutenintolerant='$gluten', laktosintolerant='$laktos', mjölkfritt='$mjölk', `annat` = '$annat', sjukdomar=$Sjukdomar, övrigt=$övrigt, date_edited=NOW() WHERE ID= $id";
		
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			header('location: anmalda.php');
		exit; 
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			echo "<p><a href='anmalda.php'>back</a></p>";
		}
	}else{
		?>
		<h1>ERROR</h1>
		<p>Något är fel var god försök igen. <a href='anmalda.php'>Tillbaka</a></p>
		<?php
	}
	$conn->close();
}

?>
</body>
</html>
