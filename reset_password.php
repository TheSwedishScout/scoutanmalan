<?php include ("function.php");?>
<!doctype html>
<html>
<?php include("head.php") ?>

<body>

    <div id="sitecontainer">
    <?php headern(); ?>
		<h1>Glömt lösenord</h1>
        <div class="deltagare">
        	<form action="reset_password_send_parse.php" method="POST">
        		<label for="username">Namn/email</label>
        		<input type="text" required="required" name="username"/>
        		<input type="submit" value="Skicka">
        	</form>
        	<!-- <strong style="font-size:50px;">Detta funkar inte just nu skicka ett mail till scout@scouten.se </strong>-->
			
        </div>
        <?php
        footern()
        ?>
    </div>
</body>
</html>