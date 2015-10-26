<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Book.org Bolivia Tech Hub</title>
      <link rel="icon" href="assets/images/favicon.ico">
      <link rel="stylesheet" type="text/css" href="assets/stylesheets/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/stylesheets/style.css">
  </head>
  <body>
      <div class="container navbar">
        <ul>
            <li class="col-md-4 brand">
                <a href="index.php"><img src="assets/images/logo.png"></a>
            </li>
            <li class="col-md-8 text-right">
              <div class="paginator">
                <a class="button button-primary button-icon button-prev" href="#"></a>
                <a class="button button-primary button-icon button-next" href="#"></a>
              </div>
              <form class="form-search">
                <input type="text" class="search" placeholder="Busca tu libro...">
                <button class="button-primary button-icon button-search" type="button"></button>
              </form>
            </li>
        </ul>
      </div>
      <div class="container library">
        <div class="row">
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
                    // iterate $body array
                    foreach($body->content as $book) {
                        echo '<div class="col-xs-4 col-md-2">';
                        echo '<a href="detail.php?id=' . $book->id . '" class="book">';
                        echo '<div class="cover"><div class="book-title">' . $book->title . '</div><img src="./assets/images/nocover.png"/></div>';
                        echo '</a>';
                        echo '</div>';
                    }
                    
                } else {
                    echo 'What if? ' . $response->getStatus();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="container footer">
        <div class="row">
          <div class="col-xs-7">
            <label>Copyright - Software Factory 2015</label>
          </div>
          <div class="col-xs-5 text-right">
            <a class="button button-primary button-icon button-info" href="#"></a>
            <a class="button button-primary button-icon button-git" href="#"></a>
          </div>
        </div>
      </div>
  </body>
</html>
