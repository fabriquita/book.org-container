<!DOCTYPE html>
<html>
    <head>
        <title>Book.org Container</title>
        <link rel="stylesheet" type="text/css" href="./assets/stylesheets/main.css">
    </head>
    <body>
        <h1>Book.org Container</h1>
        <?php
            // Guzzle library
            require 'vendor/autoload.php';
            use GuzzleHttp\Client;
            use GuzzleHttp\Message\Response;

            $client = new Client();

            $base_url = "http://localhost:8080/nucleus-backend/book/";
            try {
                $response = $client->get($base_url);
                if ($response->getStatusCode() == 200) {
                    $body = json_decode($response->getBody());
                    echo '<ul class="wrapper columns-3">';
                    // iterate $body array
                    foreach($body->content as $book) {
                        echo '<li>';
                        echo '<a href="detail.php?id=' . $book->id . '">';
                        echo '<h3>' . $book->title .'</h3>';
                        echo '</a>';
                        echo '<p>' . $book->author . '</p>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo 'What if? ' . $response->getStatus();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        ?>
    </body>
</html>