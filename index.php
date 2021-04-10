<html>
    <head>
    <title>Sorteig</title>
        <link href="css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- Header -->
        <?php include("templates/header.php"); ?>

        <!-- Content -->
        <h2>ATENÇÃO!</h2>
        <p>Essa é uma aplicação em fase de testes. A segurança da aplicação não é uma prioridade para os desenvolvedores no momento, portanto, use uma conta "descartável" para poder conectar e fazer o sorteio.</p>
        <p>Crie uma nova conta no site do Instagram e coloque as credenciais abaixo junto com o link da publicação do sorteio</p>
        <p>O link do Instagram se parece com isso: https://www.instagram.com/p/ABCDEF123456/ --- A parte que você precisa digitar abaixo (código da postagem) é apenas a última parte do link, que nesse exemplo é ABCDEF123456, mas no seu link será diferente</p>
        <br><br>
        <h3>Como funciona?</h3>
        <p>A aplicação carrega todos os comentários da postagem e usando os filtros que você definir, vai fazer o sorteio de forma <a href="https://www.inf.ufpr.br/roberto/ci067/p1_rand.html">PSEUDO ALEATÓRIA</a> dos comentários</p>
        <p>Isso significa que cada comentário tem chances praticamente iguais de ser escolhido.</p>
        <p>Por enquanto, essa aplicação suporta no máximo 2 mil comentários.</p>
        <form action="fetch_instagram_data.php" method="POST">
            <label for="username">Nome de Usuario:</label><br>
            <input type="text" name="username" id="username" placeholder="Username"><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <label for="comment">Código da Postagem:</label><br>
            <input type="text" name="post_code" id="comment" placeholder="Código da Postagem"><br>
            <label for="mentions">Número de @menções:</label><br>
            <input type="number" name="mentions" id="mentions" placeholder="Número de @Menções"><br><br>
            <label>Filtros</label><br>
            <label for="duplicated_comments">Apenas aceitar comentários sem @menções duplicadas</label>
            <input type="checkbox" id="duplicated_comments" name="duplicated_comments" value="1"><br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>
        <!-- Footer -->
        <?php include("templates/footer.php"); ?>
    </body>
</html>