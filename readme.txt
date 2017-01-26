/*README*/

---------------------------------------------
---------------------SQL---------------------
---------------------------------------------
sql databas login editeras i sql.php

---------------------------------------------
-----Tröjstorlekar & deltagarande tider------
---------------------------------------------

Filer att editera 
	*anmalan.php
	*update.php
	*download_xml.php
	*download_xml2.php
	
aktiva storlekar:
	*128
    *158
    *XS
   	*S
    *M
    *L
   	*XL
    *XXL
    *XXXL

aktiva deltagar grupper  
	config.php filen
	skriv de grupper likt "$aldersgrupp = ["Spårare","Upptackare","Ledare","Ledar barn","Funktionär"];"



---------------------------------------------
------------Allergier/Specialkost------------
---------------------------------------------
Filer att editra
	*anmalan.php
	*anmalan_parse.php
	*anmalda.php
	*update.php
	*update_parse.php
	*download_xml.php
	*download_xml2.php

allergier/spec kost som går att ha är:
	
	Vegiterian*
	Fläskfri*
	Laktosintolerant*
	Celiaki/glutenallergi*
	
	mjölkprotein
	tomat
	citrus
	ägg
	stenfrukt
	fisk och/eller skaldjur
	nötter/mandel/jordnötter
	 OBS: Vid luftburen allergi, se nedan avsnitt om medicinsk information.
	baljväxter

I fallet "annat" så räknar jag med att intedenturen har koll på dessa skälv vad de betyder.
---------------------------------------------
----------Sista anmälan/uppdatering----------
---------------------------------------------

segmentet ser ut som nedan finns i dokmenten 
	*update.php ca rad 370 
	*anmalan.php ca rad 60

$date = date('Ymd');
$last_day = "20160615"; // ------------------------------------------------SIATA ANMÄLNIGS DAG-----------------------------------------ÄNDRA!!!!!!!!!!
if ($date < $last_day){
    $action = 'action="update_parse.php"';
    $disabled = '';
}else{
    $action = 'action="to_late.php"';
    $disabled = 'disabled'; 
}


Att göra 
 * xml filens struktur få ålders grupper och så att funka med variabel på möjliga åldrar osv
