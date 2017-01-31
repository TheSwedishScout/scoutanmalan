<?php 
include 'function.php'; 
include("head.php") 

//echo "systemet kollar om du är inloggad.<br>";

if (!isset($_SESSION['user_id'])){

    //echo "Du va inte inloggad. <br>";

    

    if(isset($_POST['g-recaptcha-response'])){

        //var_dump($_POST);

        $secret = "6LfbLBMTAAAAAGhEM8Ol7kjOXRORV7Vq3RrqgF35";

        //$ip = $_SERVER['REMOTE_ADDR'];// &remoteip$ip

        $captcha = $_POST['g-recaptcha-response'];

        $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");

        //var_dump($rsp);

        $arr = json_decode($rsp,TRUE);



        //echo "Google säger att du inte är en robot.<br>";



        

        if($arr['success']){//continue checking the rest

        

            $nick = test_input($_POST['username']);

            $password = test_input($_POST['password']);

            $email = test_input($_POST['email']);

            $kår = test_input($_POST['kar']);

            $phone = test_input($_POST['phone']);

            

            //echo "Du har sagt att du tillhör &rdquo; $kår &bdquo;.";

            /*kollar så att inte något fält är tomt*/

            if (empty($nick) || empty($password) || empty($email) || empty($kår) || empty($phone)){
                /*Något fält är tomt ERROR*/
                echo "Hej du har fått problem med något.";

                    ?>

                    <h2>Saker jag kan tänka på som har gått fel är:</h2>

                    <ul style="list-style: disk">

                        <li>
                            Du har glömt att fylla i något fält
                        </li>
                        <li>
                            Du har anget samma kår som någon annan, kolla med de andra i din kår så att ni inte anmäller er två gånger.
                        </li>
                        <li>
                            Du har glömt att fylla i ett fält, testa igen.
                        </li>
                    </ul>
                    <p>Om inget av ovanstående kopiera kåden nedan och skicka till lägrets info grupp. </p>
                    <?php
            }else{

                $options = [

                    'cost' => 8

                ];

                

                $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

    	    unset($password);

                //echo "Ditt lösenord är nu krypterat och glömt.";

                //insertinge values into mysqli server

                $sql = "INSERT INTO users (username, password, kår, telefon, email)

                VALUES ('$nick', '$password_hashed', '$kår', '$phone', '$email')";

                if ($conn->query($sql) === TRUE) { //successfully insertded values to database

                    //echo "Ditt konto är nu sparat.<br>";

                    //cockie or session start

                    //echo "Du kan nu lägga in deltagare i våra listor.<br>";

                    $_SESSION['user_id'] = $nick;

                    $_SESSION['user_kår'] = $kår;

                    //mailing new user
                    //mailing('ttiimmjjee@gmail.com', $nick, $email, $kår);
                    //mailing('cecilia.odman@gmail.com', $nick, $email, $kår);


                    //send to start peage
                    header('Location: funktioner.php');
                    exit;

                } else {

    				echo "Hej du har fått problem med något.";

    				?>

                    saker jag kan tänka på som har gått fel är:

                    <ul style="list-style: disk">

                    <li>

                    	Du har samma användar namn som någon annan, testa att byta.

                    </li>

                    <li>

    			Du har anget samma kår som någon annan, kolla med de andra i din kår så att ni inte anmäller er två gånger.

                    </li>

    		<li>

    			Du har glömt att fylla i ett fält, testa igen.

    		</li>

    		</ul>

    				<p>om inget av ovanstående kopiera kåden nedan och skicka till lägrets info grupp. </p>

                    <?php

                    echo "Error: " . $sql . "<br>" . $conn->error;

                }
            }

        }else{

            echo 'Spam! det ser ut som att du är en robot! kolla captchan.'; //send to spam alert

        }

        

    }

}else{

    echo "Men du är redan inloggad";

    //send to start peage

             /*   header('Location: http://scouten.se/lager2016/');

                exit;*/

}



?>

</section>

</div>

</body>

</html>

