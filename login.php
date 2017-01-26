<?php include ("function.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>användar registrering läge&reg;2016</title>

<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="images/lägerloggo-smal.png"/>
<link rel="stylesheet" type="text/css" href="styles/main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="js/my_js.js"></script>
</head>

<body>

    <div id="sitecontainer">
        <?php headern(); ?>
    	<h1>Inlogg läge&reg;2016</h1>
        <?php
            if (isset($_GET['status'])){
                if ($_GET['status'] == "username_wrong") {
                    $status = "Användarnamn";
                }
                elseif ($_GET['status'] == "password_wrong") {
                    $status = "Lösenord";
                }else{
                    $status = "annat";
                }
                ?>
                    <div id="popup">
                        <div id="close_popup">X</div>
                        <p>Du har skrivit in fel <?php echo $status; ?>.</p>
                        <p>Var god att kolla upp det.</p>
                    </div>
                <?php
            }
        ?>
    	
    	<form action="login_parse.php" method="POST" id="nydeltagare" enctype="multipart/form-data">
        
            <label class="input"  for="username">Namn/email:</label>
            <input class="input" required="required" type="text" name="username" />

            <label class="input" for="password">Lösenord:</label>
            <input class="input" required="required" type="password" name="password" />

            <input type="submit" name="Submit" id="Submit" value="Logga in">
			<div id="info">
			
				<p><a href="reset_password.php">Glömt lösenord</a></p>
			</div>
        </form>
        
        <?php footern(); ?>
    </div>
</body>
</html>