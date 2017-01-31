<?php include ("function.php");?>

<!doctype html>

<html>

<?php include("head.php") ?>



<body>



    <div id="sitecontainer">

    <?php headern();
		if (isset($_POST['medelande'])){
			$message = test_input($_POST['medelande']);
			$from =  test_input($_POST['from']);
			$headers = "From: $from" . "\r\n" .
		             'X-Mailer: PHP/' . phpversion(). "\r\n" .
		             "Content-type: text/html; charset=UTF-8" . "\r\n"; 
		    $subject = $lägerNamn." - Medelande kontakt";
		    $to = "ttiimmjjee@gmail.com";
		    mail($to, $subject, $message, $headers);

		    header('Location: ./kontakta');
			exit;
		}
		else {
			echo "Något är fel testa igen eller skicka ett mail till scout@scouten.se. <a href='./kontakta'>Tillbaka</a>";
		}
	footern();?>
    </div>

</body>

</html>
