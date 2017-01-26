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
		<h1>Glömt lösenord</h1>
        <div class="deltagare">
        	<form action="reset_password_send_parse.php" method="POST">
        		<label for="username">Namn/email</label>
        		<input type="text" required="required" name="username"/>
        		<input type="submit" value="Skicka">
        	</form>
        	<!-- <strong style="font-size:50px;">Detta funkar inte just nu skicka ett mail till scout@scouten.se </strong>-->
			
        </div>
        <?php
        footern()
        ?>
    </div>
</body>
</html>