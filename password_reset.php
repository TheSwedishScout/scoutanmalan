

<?php include ("function.php");?>

<!doctype html>

<html>

<?php include("head.php") ?>


<body>



    <div id="sitecontainer">

    <?php headern(); ?>

		<h1>Nytt lösenord <?php echo $lägerNamn; ?></h1>

        <div class="deltagare">

			

			<!--be om koden som de fick via mail och sean sök upp det i data basen. Kolla om användarnamnet och hashen de linkades med stämmer överens.

			skriv in nytt lösenord och uppdatera lösenordet vid användaren. -->

			<?php
				if (isset($_GET['very'])){
					$_SESSION["very"] = test_input($_GET['very']);
			?>

					<form method="POST" action="password_reset_parse.php" id="nydeltagare" enctype="multipart/form-data">

						<label class="input" for="kod">Din kod:</label>

						<input class="input" required type="text" name="kod">

						<input type="submit" name="btnSubmit" id="btnSubmit" value="Skicka">

						<div id="info">

							<p>Alla fälten behövs fyllas i</p>

						</div>

					</form>
			<?php 
				}else{
			?>
					<p>Använd länken från mailet.</p>
			<?php
				}
			?>

        </div>

        <?php

        footern()

        ?>

    </div>

</body>

</html>