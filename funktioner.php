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

		<h1>Instruktioner lägeranmälan</h1>

        <div class="deltagare">

        	<h2>Anmäla funktioner på sidan</h2>

        	<p>

        	På denna sida kan du anmäla dina scouter och ledare under fliken "Anmälan". Under "Anmälda" kan du se en lista på de du har anmält.

        	Här kan du dessutom editera deltagarens information och/eller ta bort en anmäld deltagare genom att gå in på deras namn.

        	Du kan också ladda ner en lista över dina anmälda scouter som en xml fil (excel). 

        	</p>

        	<p>

        	Min sida är en sida för att du ska kunna byta lite information om dig själv bland annat ditt lösenord. Där ser du också en lista över de du har anmält.

        	</p>

        	<h2>Anmälan</h2>

        	<p>Jag tänkte förklara de olika fälten lite mer nedan och om det är något som du är osäker på efter du har läst igenom beskrivningen, kontakta oss <a href="kontakta.php">här</a>.</p>

			<h3>Förnamn</h3>

			<p>Här skriver du in förnamnet på deltagaren.</p>

			<h3>Efternamn</h3>

			<p>I detta fältet skriver du in den deltagandes Efternamn.</p>

			<h3>Bild</h3>

			<p>Är det okej att scouten är med på bilder under lägerveckan i lägertidningen, hemsidan och på lägrets facebook uppdateringar.</p>

			<h3>Avdelning</h3>

			<p>här väljer du deltagarens åldersgrupp, spårare till utmanare är ganska självklara sedan finns det lite olika ledarsorter en för helvecka 10-16,

			en för spårartiden 10-13, en delad om det är några ledare som är med halva veckan var och båda vill ha varsin lägertröja.</p>

			<h3>Tröjstorlek</h3>

			<p>De alternativ som vi har i denna lista är de storlekar vi har.</p>

            <p>Vi kommer att ha stolekarna 110/120cl, 130/140cl, 150/160cl och unisex XS-XXXXL.

			<h3>Vegetarian, Glutenintolerant, Laktosintolerant, Mjölkfritt</h3>

			<p>Kryssa i rutan om deltagaren har någon av dessa specialkoster.</p>

			<h3>Annat</h3>

			<p>Detta alternativet hänvisar till annan matallergi och om du fyller i något här måste du eller förelder ta kontakt med Intendenturen finnes <a href="http://lager2016.se/kontakt/" target="_BLANK"> här</a>.</p>

			<h3>Sjukdomar/andra allergier</h3>

			<p>I detta fält är tanken att ni skriver om deltagaren har några sjukdomar eller andra allergier som lägrets sjukvårdare bör ha koll på.</p>

			<h3>Övrig info</h3>

			<p>Här skriver du Information som lägret bör veta, t.ex för ledare som delar vecka med varandra</p>

				

			

        </div>

        <?php

        footern()

        ?>

    </div>

</body>

</html>