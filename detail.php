<!DOCTYPE html>
<html>
<head>
    <title>Detail Page</title>
    <link rel="stylesheet" type="text/css" href="./assets/stylesheets/main.css">
</head>
<body>
    <?php
        // Guzzle library
        require 'vendor/autoload.php';
        use GuzzleHttp\Client;
        use GuzzleHttp\Message\Response;

        $client = new Client();

        $base_url = "http://localhost:8080/nucleus-backend/book/";
        try {
            $response = $client->get($base_url . $_GET['id']);
            if ($response->getStatusCode() == 200) {
                $book = json_decode($response->getBody());
                echo '<h1>' . $book->title . '</h1>';
                //echo '<div class="center">';
                //echo '<img src="./img/'. $book->image .'"/>';
                //echo '</div>';
                echo '<div>'.$book->content.'</div>';
            } else {
                echo 'What if? ' . $response->getStatus();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    ?>
    <a href="index.php">Atras</a>
</body>
</html>