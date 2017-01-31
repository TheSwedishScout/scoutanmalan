<?php include ("function.php");

//var_dump($_POST);

if (true){ // kolla om användaren har rättighet att ta bort deltagare
	
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
	
	$kar = "sofia scoutkår";//$_post en hidden som skickar med användarens kår
	
	//obligatoriska fält
	$id = test_input($_POST['id'], $conn);
	$fnamn = test_input($_POST["Förnamn"], $conn);
	$enamn = test_input($_POST['Efternamn'], $conn);
	
	$sql= "DELETE FROM deltagare WHERE ID= $id";
	
	if ($conn->query($sql) === TRUE) {
		//echo "$fnamn $enamn är nu inte kvar i vår databas";
		header('location: ./anmalda.php');
		exit();
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
}
?>
