<?php

//$password = $_POST['password'];
//$username = $_POST['username'];

include ("function.php");

if (!isset($_SESSION['user_id'])){
    

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    

    $sql = "SELECT password, kår, user_lvl FROM `users` WHERE `username` = '$username' OR `email` = '$username' OR `kår` = '$username'";
    
    $result = $conn->query($sql);
        //var_dump($result);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            
            $password_hashed = $row['password'];
            
            if (password_verify($password, $password_hashed)) {
                echo 'Password is valid!';
                $_SESSION['user_id'] = $username;
                $_SESSION['user_kår'] = $row['kår'];
                $_SESSION['user_lvl'] = $row['user_lvl'];
                //send to start peage
                header('Location: index.php');
                exit;
            } else {
                echo 'Invalid password.';
                
                //send to start peage
                header('Location: login.php?status=password_wrong');
                exit;
                
                
            }
            
        } else {
            header('Location: login.php?status=username_wrong');
                exit;
        }
        mysqli_close($conn);
}else {
    echo "du är redan inloggad";
    //send to start peage
    header('Location: anmalan.php');
    exit;
}

?>