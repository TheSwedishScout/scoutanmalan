<?php include ("function.php");?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Användar registrering läge&reg;2016</title>



<meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="styles/main.css" />

<link rel="shortcut icon" href="images/lägerloggo-smal.png"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script src="js/my_js.js"></script>

</head>



<body>



    <div id="sitecontainer">

    	<?php headern(); ?>

    	<h1>Användarregistrering läge&reg;2016</h1>

    	

    	<form method="POST" action="register_parse.php" id="nydeltagare" enctype="multipart/form-data">

    		<label class="input" for="username">Namn:</label>

    		<input class="input" required type="text" name="username">

    		

    		<label class="input" for="kar">Kår:</label>

    		<input class="input" required type="text" name="kar">



    		<label class="input" for="password">Lösenord:</label>

    		<input class="input" required type="password" name="password">



    		<label class="input" for="email">e-post:</label>

    		<input class="input" required type="email" name="email">



    		<label class="input" for="phone">Telefonnummer:</label>

    		<input class="input" required type="number" name="phone">



            <label class="full">

                Med att kryssa i rutan nedan så godkänner du att ALLA registrerade deltagare under 18 år har målsmans godkännande att åka med på lägret samt att kåren accepterar faktura för de personer som är registrerade från er kår den 20 mars 2016. 

            </label>



            <label  for="CheckAvtal">Jag godkänner ovanstående</label>

            <input  name="CheckAvtal" type="checkbox" required />

    		

    		<div class="g-recaptcha" data-sitekey="6LfbLBMTAAAAAH12vB2mthlJu5BoxFmNKnvv-bBW"></div>

    		

    		<input type="submit" name="btnSubmit" id="btnSubmit" value="spara">



    		<div id="info">

                <p>Alla fälten behövs fyllas i</p>

    			<p>Det fungerar bara med ett konto per kår</p>

    		</div>

    	</form>

        <?php footern(); ?>

    </div>

</body>

</html>