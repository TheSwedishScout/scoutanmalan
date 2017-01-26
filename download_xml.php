<?php include ("function.php");

        $kår = $_SESSION['user_kår']; // get kår from user 


		$sql = "SELECT * FROM  `deltagare` WHERE  `kår` =  '$kår' ORDER BY FIELD(avdelning,'Spårare','Upptäckare','Äventyrare','Utmanare','Ledare (Spårare)','Ledare','Ledare_delad','Funktionär'), `deltagare`.`förnamn` ASC";
		

        $result = $conn->query($sql);



		/*******EDIT LINES 3-8*******/ 

		//MySQL Table Name   
		
		$filename = $kår;
		
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

		//counter to see how many in the list there is
		$count = 0;

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

		$veg = 0;
		$gluten = 0;
		$laktos = 0;
		$mjölk = 0;
		$annat = 0;

		//start of printing column names as names of MySQL fields

		for ($i = 1; $i < mysqli_num_fields($result)-2; $i++) {

		echo mysqli_fetch_field_direct($result, $i)->name . "\t";

		}

		print("\n");    

		//end of printing column names  

		//start while loop to get data

			while($row = mysqli_fetch_row($result))

			{

				$schema_insert = "";

				for($j=1; $j<mysqli_num_fields($result)-2;$j++)

				{

					if(!isset($row[$j])){

						$schema_insert .= "NULL".$sep;

					}elseif ($row[$j] != ""){

						$schema_insert .= "$row[$j]".$sep;

						if ($j == 4){
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
						
						if ($j == 6) {
							
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
							
						}

						if ($j == 7 && $row[$j] == "ja"){
							$veg ++;
						}
						if ($j == 8 && $row[$j] == "ja"){
							$gluten ++;
						}
						if ($j == 9 && $row[$j] == "ja"){
							$laktos ++;
						}
						if ($j == 10 && $row[$j] == "ja"){
							$mjölk ++;
						}
						if ($j == 11 && $row[$j] == "ja"){
							$annat ++;
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

				$count++;
			}  
			print "\n";
			print "totalt = $count $sep $sep $sep spårare = $spårare $sep $sep 110/120 = $s110 $sep $veg $sep $gluten $sep $laktos $sep $mjölk $sep $annat\n";
			print "$sep $sep $sep upptäckare = $upptackare $sep $sep 130/140 = $s130\n";
			print "$sep $sep $sep Äventyrare = $aventyrare $sep $sep 150/160 = $s150\n";
			print "$sep $sep $sep Utmanare = $utmanare $sep $sep XS = $XS\n";
			print "$sep $sep $sep Ledare = $ledare $sep $sep S = $S\n";
			print "$sep $sep $sep Ledare (delad) = $ledare_delad $sep $sep M = $M\n";
			print "$sep $sep $sep Ledare (spårare) = $ledareSpårare $sep $sep L = $L\n";
			print "$sep $sep $sep Ledar barn = $ledarbarn $sep $sep XL = $XL\n";
			print "$sep $sep $sep Funktionär = $funk $sep $sep XXL = $XXL\n";
			print "$sep $sep $sep $sep $sep XXXL = $XXXL\n";
			print "$sep $sep $sep $sep $sep XXXXL = $XXXXL\n";
			
		
		?>

