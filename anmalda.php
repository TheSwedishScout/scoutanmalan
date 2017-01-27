<?php include ("function.php");?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Anmälda läge&reg;2016</title>



<meta name="viewport" content="width=device-width">

<link rel="stylesheet" type="text/css" href="styles/main.css" />
<link rel="shortcut icon" href="images/lägerloggo-smal.png"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="js/my_js.js"></script>

<!--[if IE]>
<style type="text/css">
div.last{
	margin-bottom: @padding*17;
}
<![endif]-->

</head>



<body>



    <div id="sitecontainer">

        <?php

        headern();

		if (!isset($_SESSION['user_kår'])){

			?>
				<h1>Deltagarlista</h1>
				<div class="deltagare">

					<p> Det ser ut som att du inte har <a href="login.php">Loggat in</a>, eller så är det något annat fel.</p>

				</div>

            <?php

		}else{

			$kår = $_SESSION['user_kår']; // get kår from user

			echo "<h1>Deltagare från ".$kår."</h1>";

			echo "<div class='deltagare'>";
			echo '<p><a href="download_xml.php">Ladda ner en tabell över deltagarn.</a> (tabb delad xml utf-8) funkar bra med <a href="http://www.openoffice.org/download/">OpenOffice</a></p>';
			if($_SESSION['user_lvl'] >= 2){
				echo '<p><a href="download_xml2.php">Ladda ner en tabell över alla deltagarn.</a> (tabb delad xml utf-8)</p>';
			}
			if($_SESSION['user_lvl'] >= 3){

				$sql2 = "SELECT `kår` FROM `users` ORDER BY `kår` ASC";
				$result2 = $conn->query($sql2);
				$kårer = [];

				if ($result2->num_rows > 0) {
					while($row2 = $result2->fetch_assoc()) {
						$kårer[] = $row2['kår'];
					}
				}
				
				
				?>
				<form method="POST" action="download_xml2.php">
					<select name="val">
						<option>Alla</option>
						<option>Alla - spårar tid</option>
						<option>Alla - utan spårare</option>
						<option>Spårare</option>
						<option>Upptäckare</option>
						<option>Äventyrare</option>
						<option>Utmanare</option>
						<option>Ledare</option>
						<option>Ledare (Spårare)</option>
						<option>Ledare (delad)</option>
						<option>Funk</option>
						<option>Speckost</option>
						<?php
						foreach ($kårer as $selsectebel) {
							echo "<option>$selsectebel</option>";
						}
						?>
					</select>
					<input type="submit" value="Ladda ner" />
				</form>
				<?php
			//WHERE $_GET['where'] = $_GET['what']
			}
			echo "</div>";

			if($_SESSION['user_lvl'] >= 2){
				$sql = "SELECT * FROM  `deltagare`";
			}else{
				$sql = "SELECT * FROM  `deltagare` WHERE  `kår` =  '$kår'";
			}
			

			$result = $conn->query($sql);

			$X = 1;
			$class = "";

			if ($result->num_rows > 0) {

				// output data of each row

				while($row = $result->fetch_assoc()) {

					//var_dump($row);//skriv ut deltagarna från aktiv kår
					if( $X == $result->num_rows ){
						$class = "last";
					}

					?>

					<div class="deltagare <?php echo $class; ?>">

						<h2><a href="update.php?id=<?php echo $row['id'];?>"><?php echo $row['förnamn']. " ". $row['efternamn'];?></a></h2>

						<p>Åker som <?php echo  $row['avdelning']; ?>.</p>

						<p>Tröja: <?php echo $row['tröjstorlek']; ?>.</p>

						<div class="matallergier">

						<h3>Allergier</h3>

						<p class="mat">Speckost: <?php echo $row['speckost']; ?></p>

						</div>

					</div>

					<?php
					$X++;

				}

			}else{

				?>

				<div class="deltagare">

					<p> Du har inga registrerade för din kår för tillfälet. Eller är inte <a href="login.php"> inloggad</a></p>

				</div>

				<?php

			}

		}


		footern();
        ?>

    </div>

</body>

</html>