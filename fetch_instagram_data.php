<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $code = $_POST['post_code'];
    $mentions = $_POST['mentions'];
    $duplicated = $_POST['duplicated_comments'];

    // CMfx6yzl2sx

    // todo Tentar logar sem senha
//    if (!$username && !$password) {
//
//    }
    $instagram = Instagram::withCredentials(new Client(), $username, $password, new Psr16Adapter('Files'));
    $instagram->login();

    //Save Session to reuse Instagram login
    $instagram->saveSession(86400); //expiration set to now + 1 day

    $comments = $instagram->getMediaCommentsByCode($code, 2000);
    if ($duplicated == 1) {
        $valid_comments = array();
        $valid_text = array();

        for ($i = 0; $i < count($comments); $i++) {

            $text = $comments[$i]->getText();
            $ampersand_count = strlen($text) - strlen(str_replace('@', '', $text));

            if ($ampersand_count < (int)$mentions) {
                // Se a contagem de arrobas for menor que a quantidade de menções, descartar comentário
                continue;
            }

            // Arrumar o texto pra poder comparar
            $split_string = str_split($comments[$i]->getText());
            sort($split_string);
            $glued_string = implode($split_string);

            if (!in_array($glued_string, $valid_text)) {
                array_push($valid_text, $glued_string);
                array_push($valid_comments, $comments[$i]);
            }
        }
    } else {

        // Se não houver a necessidade de eliminar os comentários duplicados
        $valid_comments = $comments;
    }

    $valid_count = count($valid_comments);
    $total_count = count($comments);

    // Calcular o comentário sorteado já
    $drawn = $valid_comments[rand(0, count($valid_comments))];
    $send = urlencode("{$drawn->getOwner()->getUsername()}:{$drawn->getText()}");

    echo "<form action='draw_comment.php' method='post'>
            <button type='submit' name='sortear' value={$send}>SORTEAR!</button>
          </form>";



    echo "<p>Foram encontrados {$valid_count} comentários válidos de um total de {$total_count}</p><br>";

    for ($i = 0; $i < count($valid_comments); $i++) {
        // Pra cada comentário válido, imprimir na tela
        echo "<p>{$valid_comments[$i]->getOwner()->getUsername()} - {$valid_comments[$i]->getText()}</p>";
    }


}