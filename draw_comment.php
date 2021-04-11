<?php
    if (isset($_POST['sortear'])) {
        $drawn = urldecode($_POST['sortear']);
        $user = explode(':', $drawn)[0];
        $comment = explode(':', $drawn)[1];
    } else {
        echo "<p>Houve um erro ao carregar os dados. Por favor tente novamente desde o início.</p>";
        throw new \Exception('Failed loading POST data');
    }
?>

<html>
    <head>
        <title>Sorteig</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <!-- Header -->
    <?php include("templates/header.php"); ?>

    <!-- Content -->
    <h1 id="first_header">5</h1>
    <h2 id="second_header"></h2>

    </body>
</html>

<script type="text/javascript">
    const User = "<?php Print($user); ?>";
    const Comment = "<?php Print($comment); ?>";

    let first_header = document.querySelector('#first_header')
    let second_header = document.querySelector('#second_header')

    console.log("Starting the countdown")

    let timeleft = 5
    let downloadTimer = setInterval(() => {
        if( timeleft <= 0) {
            clearInterval(downloadTimer)
            first_header.innerHTML = "Parabéns!!!"
            second_header.innerHTML = "Ganhador: " + User + " - " + Comment
        } else {
            first_header.innerHTML = timeleft
        }
        timeleft -= 1
    }, 1000)


</script>