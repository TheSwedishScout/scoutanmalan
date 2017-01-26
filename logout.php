<?php include ("function.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>användar registrering läge&reg;2016</title>

<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="styles/main.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>

    <div id="sitecontainer">
    <?php headern(); ?>
        <h1>användar registrering läge&reg;2016</h1>
        <section>
            <?php
            session_start();
            session_destroy();
            //send to start peage
            header('Location: index.php');
            exit;
            ?>
        </section>
        <?php footern(); ?>
    </div>
</body>
</html>