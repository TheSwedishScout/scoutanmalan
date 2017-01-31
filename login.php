<?php include ("function.php");?>
<!doctype html>
<html>
<?php include("head.php") ?>

<body>

    <div id="sitecontainer">
        <?php headern(); ?>
    	<h1>Inlogg <?php echo $lägerNamn; ?></h1>
        <div class="deltagare">
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
                <div class="actions">
                    <input type="submit" name="Submit" id="Submit" value="Logga in">
                </div>
    			<div id="info">
    			
    				<p><a href="reset_password.php">Glömt lösenord</a></p>
    			</div>
            </form>
        </div>
        <?php footern(); ?>
    </div>
</body>
</html>