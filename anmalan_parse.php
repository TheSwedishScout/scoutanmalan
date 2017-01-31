<?php include ("function.php");
$error = false;

if ((!empty($_POST)) && (isset($_SESSION['user_id']))){
		
	$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_error());
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	$sql_main = "SET NAMES 'utf8'";
	$sql_second ="CHARSET 'utf8'";
	$result = $conn->query($sql_main);
	$result = $conn->query($sql_second);
	//mysqli::set_charset('utf8'); // when using mysqli
	//sets utf-8 as CHARSET in mySQL
	
	$kar = $_SESSION['user_kår'];
	
	//obligatoriska fält
	$fnamn = test_input($_POST['Förnamn'], $conn);
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
	if (isset($_POST["Specialkost"])){
		$speckostIn = $_POST["Specialkost"];
		foreach ($speckostIn as $kost) {
			if ($kost != "Annat") {
				$kost = test_input($kost);
				if(!in_array($kost, $speckost)){
					$error = true;
				}
			}else{
				test_input($kost);
			}

		}
		$speckosten = implode(", ", $speckostIn);
	}else{
		$speckosten = "";
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
		$sql= "INSERT INTO `deltagare` (`förnamn`, `efternamn`, `bild`, `avdelning`, `kår`, `tröjstorlek`, `speckost`, `sjukdomar`, `övrigt`, `date_added`, `date_edited`) VALUES ('$fnamn', '$enamn', '$bild', '$avdelning', '$kar', '$tshirt', '$speckosten', $Sjukdomar, $övrigt, NOW(), NOW());";
		
		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
			header('location: anmalan.php?anmäld=sparad');
			exit; 
		} else {
			echo "<h1>Något har blivit fel kontakta oss på mail</h1>";
			echo "Error: " . $sql . "<br>" . $conn->error;
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