<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Book.org Bolivia Tech Hub</title>
      <link rel="icon" href="img/favicon.ico">
      <link rel="stylesheet" type="text/css" href="assets/stylesheets/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="assets/stylesheets/style.css">
  </head>
  <body>
      <div class="container navbar">
        <ul>
            <li class="col-md-4 brand">
                <a href="index.php"><img src="./assets/images/logo.png"></a>
            </li>
            <li class="col-md-8 text-right">
              <div class="paginator">
                <a class="button button-primary" href="index.php">< Volver</a>
              </div>
            </li>
        </ul>
      </div>
      <div class="container desk">
          <div class="book">
              <div class="cover col-md-3"><img src="./assets/images/nocover.png"/></div>
              <div class="description col-md-9">
                  <div class="navbar">
                  <div class="paginator pull-right">
                <a class="button button-primary button-icon button-prev" href="#"></a>
                <a class="button button-primary button-icon button-next" href="#"></a>
              </div>
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
                            echo '</div>';
                            echo '<div class="text">';
                            echo $book->content;
                            echo '</div>';
                        } else {
                            echo 'What if? ' . $response->getStatus();
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                ?>
              </div>
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
