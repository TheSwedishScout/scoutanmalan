<?php include ("function.php");?>
<!doctype html>
<html>
<?php include("head.php") ?>

<body>

    <div id="sitecontainer">
    <?php headern(); ?>
		<h1>Anmälnings sidan för <?php echo $lägerNamn; ?></h1>
        <div class="deltagare">
        	<h2>Instruktion lägeranmälan för kårer</h2>
			<h3>Lägerperiod</h3>

			<p>Upptäckare, Äventyrare, Utmanare och Ledare deltar hel vecka (10-16 juli).</p>

			<p>Spårare och spårarledare deltar tre nätter (10-13 juli)</p>

			<p>Funktionärer kommer en dag tidigare och åker hem en dag senare (9-17 juli)</p>


			<h3>Specialkost</h3>

			<p>På <?php echo $lägerNamn; ?> kommer hela matsedeln vara fri från nötter och soja. Dock kan soja förekomma i det vegetariska alternativet, detta är i så fall angivet under respektive recept. För den som har behov av specialkost erbjuds följande alternativ: <?php echo implode(", ", $speckost); ?>.</p>

			 

			<p>Har du/ditt barn någon kostproblematik som inte täcks av ovanstående är du välkommen att kontakta intendenturansvarig <?php echo $kontaktMat; ?> via <?php echo $kontaktMatMail ?> och diskutera en lämplig lösning. </p>


			<h3>Sjukdomar</h3>

			<p>Anges endast om personen har sjukdom som kan påverka deltagandet på lägret.</p>

			 

			<h3>Övrig info</h3>

			<p>Om ni är två ledare som delar på en lägervecka så anmäl ledare 1 och ange rätt lägerperiod. Anmäl sedan ledare 2 och välj alternativet ”Ledare delad” i rullisten för lägerperiod. Ange därefter i rutan ”övrig info” vem personen delar period med. Kåren kommer då att bli fakturerad för en ledare samt (om tröja kryssats i) en extra lägertröja om 100 kronor.</p>

			 

			<h3>Ändra anmälan</h3>

			<p>Fram till den <?php echo date("d M Y", strtotime($last_day));?> har kåren möjlighet att göra ändringar i sin anmälan genom att logga in på kontot och själva ta bort/lägga till personer, ändra tröjstorlekar, kost etc. Efter den 20 mars kan ni inte längre ändra i anmälan men ni kan fortfarande logga in och se er anmälan.</p>
			
        </div>
        <?php
        footern()
        ?>
    </div>
</body>
</html>