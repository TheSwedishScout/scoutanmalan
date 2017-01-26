<?php include ("function.php");?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Anmälan läge&reg;2016</title>



<meta name="viewport" content="width=device-width">

<link rel="shortcut icon" href="images/lägerloggo-smal.png"/>

<link rel="stylesheet" type="text/css" href="styles/main.css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="js/my_js.js"></script>

</head>



<body>



    <div id="sitecontainer">

    <?php headern();
		if (isset($_POST['medelande'])){
			$message = test_input($_POST['medelande']);
			$from =  test_input($_POST['from']);
			$headers = "From: $from" . "\r\n" .
		             'X-Mailer: PHP/' . phpversion(). "\r\n" .
		             "Content-type: text/html; charset=UTF-8" . "\r\n"; 
		    $subject = "Läger2016 - Medelande kontakt";
		    $to = "ttiimmjjee@gmail.com";
		    mail($to, $subject, $message, $headers);

		    header('Location: http://scouten.se/lager2016/kontakta');
			exit;
		}
		else {
			echo "Något är fel testa igen eller skicka ett mail till scout@scouten.se. <a href='http://scouten.se/lager2016/kontakta'>Tillbaka</a>";
		}
	footern();?>
    </div>

</body>

</html>
