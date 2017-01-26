<?php include ("function.php");

  

	    $kår = $_SESSION['user_kår']; // get kår from user 

        $filename = $kår; //Table name (file name)



        if(($_SESSION['user_lvl'] >= 2) && (isset($_POST))){

        	$what = test_input($_POST['val']);

        	$order_avdelning = "FIELD(avdelning,'Spårare','Upptäckare','Äventyrare','Utmanare','Ledare (Spårare)','Ledare','Ledare_delad','Funktionär')";

        	$filename = $what;

        	switch ($what) {

        		case 'Alla':

        			$sql = "SELECT * FROM  `deltagare` ORDER BY `kår` ASC, $order_avdelning, `deltagare`.`förnamn` ASC";



        			break;

        		case 'Alla - spårar tid':

        			$sql = "SELECT * FROM  `deltagare` ORDER BY `kår` ASC, $order_avdelning, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Alla - utan spårare':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` != 'Ledare (Spårare)' AND `avdelning` != 'Spårare' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Spårare':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'Spårare' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Upptäckare':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'Upptäckare' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Äventyrare':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'Äventyrare' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Utmanare':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'Utmanare' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Ledare':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'Ledare' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Ledare (Spårare)':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'Ledare (Spårare)' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Ledare (delad)':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'Ledare_delad' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Funk':

        			$sql = "SELECT * FROM `deltagare` WHERE `avdelning` = 'funktionär' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;

        		case 'Speckost':

        			$sql = "SELECT * FROM `deltagare` WHERE `vegetarian` LIKE 'ja' OR `glutenintolerant` LIKE 'ja' OR `laktosintolerant` LIKE 'ja' OR `mjölkfritt` LIKE 'ja' OR `annat` LIKE 'ja' ORDER BY `deltagare`.`kår` ASC, `deltagare`.`förnamn` ASC";

        			break;



        		/*--------------------val kår vis ---------------------*/

        		default:

        			$sql = "SELECT * FROM  `deltagare` WHERE  `kår` =  '$what' ORDER BY $order_avdelning, `deltagare`.`förnamn` ASC";

        			break;

        	}

        }elseif($_SESSION['user_lvl'] >= 2){

			$sql = "SELECT * FROM  `deltagare` ORDER BY `kår` ASC, $order_avdelning, `deltagare`.`förnamn` ASC";

		}else{

			$sql = "SELECT * FROM  `deltagare` WHERE  `kår` =  '$kår' ORDER BY $order_avdelning, `deltagare`.`förnamn` ASC";

		}

		

        $result = $conn->query($sql);







		/*******EDIT LINES 3-8*******/ 



		

		         //File Name



		/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    



		//execute query 



		$result = $conn->query($sql);



		$file_ending = "xls";



		//header info for browser



		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");


		header("Content-Disposition: attachment; filename=$filename.xls");  



		header("Pragma: no-cache"); 

		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);

		header("Expires: 0");



		/*******Start of Formatting for Excel*******/   



		//define separator (defines columns in excel & tabs in word)



		$sep = "\t"; //tabbed character

		$count = 0;
		$aktiv_kår = "";
		$aktiv_kår_count = 0;



		//avdelning 

		$spårare = 0;

		$upptackare = 0;

		$aventyrare = 0;

		$utmanare = 0;

		$ledare = 0;

		$ledare_delad = 0;

		$ledareSpårare = 0;

		$ledarbarn = 0;

		$funk = 0;



		/*tröjstorlekar*/



		$s110 = 0;

        $s130 = 0;

        $s150 = 0;

		$XS = 0;

       	$S = 0;

        $M = 0;

        $L = 0;

       	$XL = 0;

        $XXL = 0;

        $XXXL = 0;

		$XXXXL = 0;



        /*allergier*/

		$total_veg = 0;

		$total_gluten = 0;

		$total_laktos = 0;

		$total_mjölk = 0;

		$total_annat = 0;

		$veg = 0; 

			$vegGluten = 0; 

				$vegGlutenLaktos = 0;

					$vegGlutenLaktosMjölk = 0;

					$vegGlutenLaktosAnnat = 0;

						$vegGlutenLaktosMjölkAnnat = 0;

				$vegGlutenMjölk = 0;

					$vegGlutenMjölkAnnat = 0;

				$vegGlutenAnnat = 0;



			$vegLaktos = 0;

				$vegLaktosMjölk = 0;

					$vegLaktosMjölkAnnat = 0;

				$vegLaktosAnnat = 0;

			$vegMjölk = 0; 

				$vegMjölkAnnat = 0;

			$vegAnnat = 0;

		$gluten = 0; 

			$glutenLaktos = 0;

				$glutenLaktosMjölk = 0;

					$glutenLaktosMjölkAnnat = 0;

				$glutenLaktosAnnat = 0;

			$glutenMjölk = 0; 

				$glutenMjölkAnnat = 0;

			$glutenAnnat = 0;

		$laktos = 0; 

			$laktosMjölk = 0; 

				$laktosMjölkAnnat = 0;

			$laktosAnnat = 0;

		$mjölk = 0; 

			$mjölkAnnat = 0;

		$annat = 0;



		//start of printing column names as names of MySQL fields



		for ($i = 1; $i < mysqli_num_fields($result)-2; $i++) {



		echo ucfirst(mysqli_fetch_field_direct($result, $i)->name) . "\t";




		}



		print("\n");    



		//end of printing column names  



		//start while loop to get data



			while($row = mysqli_fetch_row($result))



			{



				$schema_insert = "";

				/*om kår är samma som innan lägg på ett på lår coounter annars nolla*/
					if ($aktiv_kår == $row[4]){
						$aktiv_kår_count ++;
					}else{
						if ($aktiv_kår_count != 0){
							echo $aktiv_kår.$sep.$aktiv_kår_count."\n";
						}
						$aktiv_kår = $row[4];
						$aktiv_kår_count = 1;
					}

				for($j=1; $j<mysqli_num_fields($result)-2;$j++)



				{
					

					if(!isset($row[$j])){
						$schema_insert .= "".$sep;
					}elseif ($row[$j] != ""){
						$schema_insert .= "$row[$j]".$sep;
			            if ($j == 3){
							switch($row[$j]){
								case "Spårare":
									$spårare ++;
									break;
								case "Upptäckare":
									$upptackare ++;
									break;
								case "Äventyrare":
									$aventyrare ++;
									break;
								case "Utmanare":
									$utmanare ++;
									break;
								case "Ledare":
									$ledare ++;
									break;
								case 'Ledare_delad':
									$ledare_delad ++;
									break;
								case "Ledare (Spårare)":
									$ledareSpårare ++;
									break;
								case "Ledarbarn":
									$ledarbarn ++;
									break;
								case "Funktionär":
									$funk ++;
									break;
							}
						}
						if ($j == 5) {
								if ($row[$j] == '110/120'){
									$s110 ++;
								}
								if ($row[$j] == '130/140'){
									$s130 ++;
								}
								if ($row[$j] == '150/160'){
									$s150 ++;
								}
								if ($row[$j] == 'XS'){
									$XS ++;
								}
								if ($row[$j] == 'S'){
									$S ++;
								}
								if ($row[$j] == 'M'){
									$M ++;
								}
								if ($row[$j] == 'L'){
									$L ++;
								}
								if ($row[$j] == 'XL'){
									$XL ++;
								}
								if ($row[$j] == 'XXL'){
									$XXL ++;
								}
								if ($row[$j] == 'XXXL'){
									$XXXL ++;
								}
								if ($row[$j] == 'XXXXL'){
									$XXXXL ++;
								}
						}
						/*----------------------------------------------------------------------------------------VEG-------------------------------------------------------------------------------------------*/
						/*----------------------------------------------------------------------------------------VEG-------------------------------------------------------------------------------------------*/
						/*----------------------------------------------------------------------------------------VEG-------------------------------------------------------------------------------------------*/
						if ($j == 6 && $row[$j] == "ja"){
							$total_veg ++;
							if ($row[7] == "nej" && $row[8] == "nej" && $row[9] == "nej" && $row[10] == "nej"){
								$veg ++;
							}
									/*--------------------------------------------------------------------------------------VEG Gluten-----------------------------*/
								if ($row[7] == "ja" && $row[8] == "nej" && $row[9] == "nej" && $row[10] == "nej"){
									$vegGluten ++;
								}	
									if ($row[7] == "ja" && $row[8] == "ja" && $row[9] == "nej" && $row[10] == "nej"){
										$vegGlutenLaktos ++;
									}
										if ($row[7] == "ja" && $row[8] == "ja" && $row[9] == "ja" && $row[10] == "nej"){
											$vegGlutenLaktosMjölk ++;
										}
										if ($row[7] == "ja" && $row[8] == "ja" && $row[9] == "nej" && $row[10] == "ja"){
											$vegGlutenLaktosAnnat ++;
										}
											if ($row[7] == "ja" && $row[8] == "ja" && $row[9] == "ja" && $row[10] == "ja"){
												$vegGlutenLaktosMjölkAnnat ++;
											}
									if ($row[7] == "ja" && $row[8] == "nej" && $row[9] == "ja" && $row[10] == "nej"){
										$vegGlutenMjölk ++;
									}
										if ($row[7] == "ja" && $row[8] == "nej" && $row[9] == "ja" && $row[10] == "ja"){
											$vegGlutenMjölkAnnat ++;
										}
									if ($row[7] == "ja" && $row[8] == "nej" && $row[9] == "nej" && $row[10] == "ja"){
										$vegGlutenAnnat ++;
									}
								/*-------------------------------------------------------------------------------VEG LAKTOS--------------------------------------------------------*/
								if ($row[7] == "nej" && $row[8] == "ja" && $row[9] == "nej" && $row[10] == "nej"){

									$vegLaktos ++;

								}

									if ($row[7] == "nej" && $row[8] == "ja" && $row[9] == "ja" && $row[10] == "nej"){

										$vegLaktosMjölk ++;

									}

										if ($row[7] == "nej" && $row[8] == "ja" && $row[9] == "ja" && $row[10] == "ja"){

											$vegLaktosMjölkAnnat ++;

										}

									if ($row[7] == "nej" && $row[8] == "ja" && $row[9] == "nej" && $row[10] == "ja"){

										$vegLaktosAnnat ++;

									}

								/*-------------------------------------------------------------------------------VEG Mjölk--------------------------------------------------------*/

								if ($row[7] == "nej" && $row[8] == "nej" && $row[9] == "ja" && $row[10] == "nej"){

									$vegMjölk ++;

								}

									if ($row[7] == "nej" && $row[8] == "nej" && $row[9] == "ja" && $row[10] == "ja"){

										$vegMjölkAnnat ++;

									}

								/*-------------------------------------------------------------------------------VEG Annat--------------------------------------------------------*/

								if ($row[7] == "nej" && $row[8] == "nej" && $row[9] == "nej" && $row[10] == "ja"){

									$vegAnnat ++;

								}

						}

						/*----------------------------------------------------------------------------------------------GLUTEn--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------GLUTEn--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------GLUTEn--------------------------------------------------------------------------------------*/

						if ($j == 7 && $row[$j] == "ja"){

							$total_gluten ++;

							if ($row[6] == "nej" && $row[8] == "nej" && $row[9] == "nej" && $row[10] == "nej"){

								$gluten ++;

							}

							if ($row[6] == "nej" && $row[8] == "ja" && $row[9] == "nej" && $row[10] == "nej"){

								$glutenLaktos ++;

							}

								if ($row[6] == "nej" && $row[8] == "ja" && $row[9] == "ja" && $row[10] == "nej"){

									$glutenLaktosMjölk ++;

								}

									if ($row[6] == "nej" && $row[8] == "ja" && $row[9] == "ja" && $row[10] == "ja"){

										$glutenLaktosMjölkAnnat ++;

									}

								if ($row[6] == "nej" && $row[8] == "ja" && $row[9] == "nej" && $row[10] == "ja"){

									$glutenLaktosAnnat ++;

								}



							if ($row[6] == "nej" && $row[8] == "nej" && $row[9] == "ja" && $row[10] == "nej"){

								$glutenMjölk ++;

							}

								if ($row[6] == "nej" && $row[8] == "nej" && $row[9] == "ja" && $row[10] == "ja"){

									$glutenMjölkAnnat ++;

								}

							if ($row[6] == "nej" && $row[8] == "nej" && $row[9] == "nej" && $row[10] == "ja"){

								$glutenAnnat ++;

							}

						}

						/*----------------------------------------------------------------------------------------------LAKTOS--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------LAKTOS--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------LAKTOS--------------------------------------------------------------------------------------*/						

						if ($j == 8 && $row[$j] == "ja"){

							

							$total_laktos ++;

							

							if ($row[6] == "nej" && $row[7] == "nej" && $row[9] == "nej" && $row[10] == "nej"){

								$laktos ++;

							}

							if ($row[6] == "nej" && $row[7] == "nej" && $row[9] == "ja" && $row[10] == "nej"){

								$laktosMjölk ++;

							}

								if ($row[6] == "nej" && $row[7] == "nej" && $row[9] == "ja" && $row[10] == "ja"){

									$laktosMjölkAnnat ++;

								}

							if ($row[6] == "nej" && $row[7] == "nej" && $row[9] == "nej" && $row[10] == "ja"){

								$laktosAnnat ++;

							}

						}

						/*----------------------------------------------------------------------------------------------MJÖLK--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------MJÖLK--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------MJÖLK--------------------------------------------------------------------------------------*/



						if ($j == 9 && $row[$j] == "ja"){

							

							$total_mjölk ++;

							

							if ($row[6] == "nej" && $row[7] == "nej" && $row[8] == "nej" && $row[10] == "nej"){

								$mjölk ++;

							}

							if ($row[6] == "nej" && $row[7] == "nej" && $row[8] == "nej" && $row[10] == "ja"){

								$mjölkAnnat ++;

							}

						}

						/*----------------------------------------------------------------------------------------------ANNAT--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------ANNAT--------------------------------------------------------------------------------------*/

						/*----------------------------------------------------------------------------------------------ANNAT--------------------------------------------------------------------------------------*/



						if ($j == 10 && $row[$j] == "ja"){

							$total_annat ++;
							if ($row[6] == "nej" && $row[7] == "nej" && $row[8] == "nej" && $row[9] == "nej"){
								$annat ++;
							}
						}
					}else{
						$schema_insert .= "".$sep;
					}

				}



				$schema_insert = str_replace($sep."$", "", $schema_insert);



				$schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);



				$schema_insert .= "\t";



				print(trim($schema_insert));



				print "\n";

				$count ++;

				



			}   
			echo $aktiv_kår.$sep.$aktiv_kår_count."\n";

				print "\n";			/*Skriver ut ihop räkningar av antal alergiker och deltagare*/
 
			print "Totalt = $count $sep $sep Spårare = $spårare $sep $sep 110/120 = $s110 $sep Total veg = $total_veg $sep Total gluten = $total_gluten $sep Total laktos = $total_laktos $sep Total Mjölk = $total_mjölk $sep Totalt annat = $total_annat \n";

			print "$sep $sep Upptäckare = $upptackare $sep $sep 130/140 = $s130 $sep Veg = $veg $sep Gluten = $gluten $sep Laktos = $laktos $sep Mjölk = $mjölk $sep Annat = $annat $sep\n";

			print "$sep $sep Äventyrare = $aventyrare $sep $sep 150/160 = $s150 $sep Veg & Gluten = $vegGluten $sep Gluten & Laktos = $glutenLaktos $sep Laktos & Mjölk = $laktosMjölk $sep Mjölk & annat = $mjölkAnnat$sep $sep\n";

			print "$sep $sep Utmanare = $utmanare $sep $sep XS = $XS $sep Veg, Gluten & Laktos = $vegGlutenLaktos $sep Gluten, Laktos & mjölk = $glutenLaktosMjölk $sep Laktos mjölk & Annat = $laktosMjölkAnnat $sep $sep $sep\n";

			print "$sep $sep Ledare = $ledare $sep $sep S = $S $sep Veg, Gluten, Laktos & mjölk = $vegGlutenLaktosMjölk $sep Gluten, Laktos, Mjölk & annat = $glutenLaktosMjölkAnnat $sep Laktos & Annat = $laktosAnnat $sep $sep $sep\n";

			print "$sep $sep Ledare_delad = $ledare_delad $sep $sep M = $M $sep Veg, Gluten, Laktos & Annat = $vegGlutenLaktosAnnat $sep Gluten, Laktos & Annat = $glutenLaktosAnnat $sep $sep $sep $sep\n";

			print "$sep $sep Ledare (spårare) = $ledareSpårare $sep $sep L = $L $sep Veg, Gluten, Laktos, Mjölk & Annat = $vegGlutenLaktosMjölkAnnat $sep Gluten & Mjölk = $glutenMjölk $sep $sep $sep $sep\n";

			print "$sep $sep Ledar barn = $ledarbarn $sep $sep XL = $XL $sep Veg, Gluten & Mjölk = $vegGlutenMjölk $sep Gluten, Mjölk & Annat = $glutenMjölkAnnat $sep $sep $sep $sep\n";

			print "$sep $sep Funktionär = $funk $sep $sep XXL = $XXL $sep Veg, Gluten, Mjölk & Annat = $vegGlutenMjölkAnnat $sep Gluten & Annat = $glutenAnnat$sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep XXXL = $XXXL $sep Veg, Gluten & Annat = $vegGlutenAnnat $sep $sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep XXXXL = $XXXXL $sep Veg & Laktos = $vegLaktos $sep $sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep $sep Veg, Laktos & Mjölk = $vegLaktosMjölk $sep $sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep $sep Veg, Laktos & Mjölk & Annat = $vegLaktosMjölkAnnat $sep $sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep $sep Veg, Laktos & Annat = $vegLaktosAnnat $sep $sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep $sep Veg, Mjölk = $vegMjölk $sep $sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep $sep Veg, Mjölk & Annat = $vegMjölkAnnat $sep $sep $sep $sep $sep\n";

			print "$sep $sep $sep $sep $sep Veg, Annat = $vegAnnat $sep $sep $sep $sep $sep\n";

			



			/*



		$laktos = 0; 

			$laktosMjölk = 0; 

				$laktosMjölkAnnat = 0;

			$laktosAnnat = 0;

		$mjölk = 0; 

			$mjölkAnnat = 0;

		$annat = 0;

			*/

		?>



