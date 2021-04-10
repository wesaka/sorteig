<?php
    if (isset($_POST['sortear'])) {
        $drawn = urldecode($_POST['sortear']);
        $user = explode(':', $drawn)[0];
        $comment = explode(':', $drawn)[1];
    }
?>

<html>
    <head>
        <title>Sorteig</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
    '</head>'
    <body>
    <!-- Header -->
    <?php include("templates/header.php"); ?>

    <!-- Content -->
    <h1>Parabéns!!!</h1>
    <h2>Ganhador: <?php echo "{$user} - {$comment}" ?></h2>

    </body>
</html>