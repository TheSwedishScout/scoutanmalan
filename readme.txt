/*README*/

Anmälda deltagare kommer in under kåren den som anmäler har angivit

---------------------------------------------
---------------------SQL---------------------
---------------------------------------------
sql databas login editeras i sql.php

---------------------------------------------
-----Tröjstorlekar & deltagarande tider------
---------------------------------------------
deltagande ålder och tid
editera $aldersgrupp i config med de önskade parametrana
$aldersgrupp = ["Spårare","Upptackare","Ledare","Ledar barn","Funktionär"];

Filer att editera 

	*download_xml.php
	*download_xml2.php
	
Tröjor:
	config.php filen
	skriv de grupper likt:
	$aldersgrupp = ["Spårare","Upptackare","Ledare","Ledar barn","Funktionär"];



---------------------------------------------
------------Allergier/Specialkost------------
---------------------------------------------
skriv de special koster ni räknar med i en array i variablen $speckost likt: 
$speckost = ["Vegiterian",	"Fläskfri",	"Laktosintolerant",	"Celiaki/glutenallergi"];

Annat finns med där det kommer ett popup fönster där det står "Kontakta lägrets intedentur för att diskutera en lämplig lösning."  true / false
	

I fallet "annat" så räknar jag med att intedenturen har koll på dessa skälv vad de betyder.
---------------------------------------------
----------Sista anmälan/uppdatering----------
---------------------------------------------

sista anmälningsdagen anges i yyyymmdd och då blir det 23:59 den dagen (kan bero på var servern är instäld på för datum)
$last_day = "20170615"; // Sista anmälningsdag kl 2359 angiven dag


Att göra 
 * xml filens struktur få ålders grupper och så att funka med variabel på möjliga åldrar osv
 * disabla storlekar, ålder och spec kostyen när datum har gått ut
