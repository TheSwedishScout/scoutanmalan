<?php include ("function.php");

//var_dump($_POST);
$error = false;

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
		
	
		$sql= "UPDATE deltagare SET förnamn='$fnamn', efternamn='$enamn', bild='$bild', avdelning='$avdelning', tröjstorlek='$tshirt', speckost='$speckosten', sjukdomar=$Sjukdomar, övrigt=$övrigt, date_edited=NOW() WHERE ID= $id";
		
		if ($conn->query($sql) === TRUE) {
			//echo "New record created successfully";
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
