<?php
include ("function.php");
if (isset($_SESSION['user_kår'])){
	$kår = $_SESSION['user_kår'];
	$password = test_input($_POST['password']);
	$password_old = test_input($_POST['password_old']);
	$email = test_input($_POST['email']);
	$phone = test_input($_POST['phone']);


	$sql = "SELECT * FROM `users` WHERE `kår` = '$kår' LIMIT 1";


	$result = $conn->query($sql);
        //var_dump($result);
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        
        $password_hashed_old = $row['password'];
        $email_old = $row['email'];
        $phone_old = $row['telefon'];
    }
            


    $password_update  ="";
    $email_update = "";
    $phone_update = "";
    $updated = "";

	if(!empty($password)){

		if (password_verify($password_old, $password_hashed_old)) { /*kolla att lösenord är det gamla (verifera användaren).*/

		$options = [
                'cost' => 8
            ];

            $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

        

		    unset($password);

			$sql2 = "UPDATE `users` SET `password`='$password_hashed' WHERE `kår` = '$kår'";

			if ($conn->query($sql2) === TRUE) {
			    echo "Ditt lösenord är uppdaterat!";
			    $password_update= "password=updated";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
		}else{
			echo "fel lösenord";
		}

	}

	if ($email != $email_old) {
		$sql3 = "UPDATE `users` SET `email`='$email' WHERE `kår` = '$kår'";

		if ($conn->query($sql3) === TRUE) {
		    echo "Din email adress är uppdaterad!";
		    $email_update = "email=updated";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
		
	}

	if ($phone != $phone_old) {
		$sql4 = "UPDATE `users` SET `telefon`='$phone' WHERE `kår` = '$kår'";

		if ($conn->query($sql4) === TRUE) {
		    echo "Ditt telefonnummer är uppdaterat!";
		    $phone_update = "phone=updated";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
		
	}
	
	$updated = "$password_update&$email_update&phone_update";

	header("location: mittkonto.php?$updated");
	exit;

}else{
	header('location: login.php');
	exit;
}
?>