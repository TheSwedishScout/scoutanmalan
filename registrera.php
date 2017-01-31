<?php include ("function.php");?>

<!doctype html>

<html>

<?php include("head.php") ?>



<body>



    <div id="sitecontainer">

    	<?php headern(); ?>

    	<h1>Användarregistrering <?php echo $lägerNamn; ?></h1>

    	
        <div class="deltagare">
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

                    Med att kryssa i rutan nedan så godkänner du att ALLA registrerade deltagare under 18 år har målsmans godkännande att åka med på lägret samt att kåren accepterar faktura för de personer som är registrerade från er kår den <?php echo date("d M Y", strtotime($last_day));?>. 

                </label>



                <label  for="CheckAvtal">Jag godkänner ovanstående</label>

                <input  name="CheckAvtal" type="checkbox" required />

        		

        		<div class="g-recaptcha" data-sitekey="6LfbLBMTAAAAAH12vB2mthlJu5BoxFmNKnvv-bBW"></div>

        		
                <div class="actions">
        		  <input type="submit" name="btnSubmit" id="btnSubmit" value="Skapa">
                </div>


        		<div id="info">

                    <p>Alla fälten behövs fyllas i</p>

        			<p>Det fungerar bara med ett konto per kår</p>

        		</div>

        	</form>
        </div>

        <?php footern(); ?>

    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>