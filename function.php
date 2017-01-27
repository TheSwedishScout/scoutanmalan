<?php

include ("sql.php");
include ("config.php");

session_start();



$conn = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die(mysqli_error());



if ($conn->connect_error) {

	die("Connection failed: " . $conn->connect_error);

} 



$sql_main = "SET NAMES 'utf8'";

$sql_second ="CHARSET 'utf8'";

$result = $conn->query($sql_main);

$result = $conn->query($sql_second);

//mysqli::set_charset('utf8'); // when using mysqli

//sets utf-8 as CHARSET in mySQL§



function headern(){

	//echo "
	global $lagerbild;

	

	?>

		<header>

				<nav id="main_menu">

					<a href="index.php" id="loggon" ><img src="<?php echo $lagerbild; ?>" alt="loggo"/></a>
						<ul>
								<li><a href="index.php">Start</a></li>
								<li><a href="anmalan">Ny scout</a></li>
								<li><a href="anmalda">Anmälda</a></li>
								<?php
									if(!isset($_SESSION['user_id'])){
								?>
										<li><a href="registrera">Nytt konto</a></li>
										<li><a href="login">Logga in</a></li>
								<?php
									}else{
								?>
										<li><a href="mittkonto">Min sida</a></li>
										<li><a href="logout">Logga ut </a></li>
								<?php
									}
								?>
						</ul>

						<a href="#" id="burger"><img src="images/burger.png"></a>       

				</nav>

		</header>
		<main>

		

		<?php

	//";

}

function footern(){
	?>
		</main>
		<footer>
			<ul>
				<li><a href="http://www.lager2016.se">läge&reg;2016</a></li>
				<li><a href="kontakta">Kontakt</a></li>
				<li><a href="vanligafragor">FAQ</a></li>
				<li><a href="funktioner" >Instruktioner</a></li>
				<li><a href="https://www.facebook.com/lager2016/"><img src="images/social/facebook-4096-black.png" /></a></li>
			</ul>
			<small>Copyright &copy; 2016 Max Timje & Läge&reg;</small>
		</footer>
	<?php
}

function test_input($data) {

	global $conn;

	$data = trim($data);

	$data = stripslashes($data);

	$data = htmlspecialchars($data);

	$data = mysqli_real_escape_string ( $conn , $data );

	return $data;

}

function random_string($len){
	$seed = str_split("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ");
	shuffle($seed);
	$rand = '';
	foreach (array_rand($seed, $len) as $k) {
		$rand .= $seed[$k];
	}
	return $rand;
}


function mailing($to, $nick, $email, $kår){
	$subject = "Ny kår - $kår";
	$message = "$kår har nu registrerat sitt konto för att kunna registrera användare.\n Användare: $nick. \n mail: $email";
	$headers = 'From: no-replay@scouten.se' . "\r\n" .
						 'X-Mailer: PHP/' . phpversion(). "\r\n" .
						 "Content-type: text/html; charset=UTF-8" . "\r\n"; 

	mail($to, $subject, $message, $headers);
}

function printAldersgrupper($disabled = false, $avdelning = ""){
	global $aldersgrupp;

	?>
	<label class="input" for="avdelning">Avdelning*:</label>
	<select class="input" <?php if($disabled){ echo "disabled";} ?> required  name="avdelning"><?php
			foreach ($aldersgrupp as $alder) {
		?>
				<option <?php if($avdelning == $alder){ echo "selected";} ?> value="<?php echo $alder; ?>"><?php echo $alder; ?></option>
			<?php } ?>
		</select>
	<?php
}

function printTshirts($disabled = false, $valdStorlek = ""){
	global $tshirts;

	?>
	<label class="input" for="t-shirt">Tröjstorlek*:</label>
	<select class="input" <?php if($disabled){ echo "disabled";} ?> required  name="t-shirt"><?php
			foreach ($tshirts as $storlek) {
		?>
				<option <?php if($valdStorlek == $storlek){ echo "selected";} ?> value="<?php echo $storlek; ?>"><?php echo $storlek; ?></option>
			<?php } ?>
		</select>
	<?php
}
function printSpeckost($disabled = false, $specArray = []){
	global $speckost;
	global $annanSpecKost;
	$i = 0;
	foreach ($speckost as $kost) {
		# code...
	?>
		<label class="input" for="Specialkost"><?php echo $kost; ?></label>
		<input <?php if(in_array($kost, $specArray)){echo "checked";} ?> class="input" <?php if($disabled){ echo "disabled";} ?> type="checkbox" name="Specialkost[<?php echo $i; ?>]" value="<?php echo $kost; ?>">
		<?php
		$i++;
	}
	if ($annanSpecKost == true){
		?>
		<label class="input" for="Specialkost">Annat (kontakta)</label>
		<input <?php if(in_array("Annat", $specArray)){echo "checked";} ?> class="input" <?php echo $disabled; ?> type="checkbox" id="annat" name="Specialkost[<?php echo $i; ?>]" value="Annat">
		<?php
	}
}


?>