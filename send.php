<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simple PHP Captcha Test Form With jQuery Validate</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <h3 class="text-muted">Simple PHP Captcha</h3>
      </div>

      <?php

      session_start();

      if (isset($_REQUEST['captcha']) && isset($_SESSION['captcha']) && strtoupper($_REQUEST['captcha']) == strtoupper($_SESSION['captcha'])) {
        echo '<p>Captcha valid!</p>';
      } else {
        echo '<p>Captcha invalid!</p>';
      }
      ?>

      <p>
        <a href="sample-form-with-validate.html"><< back</a>
      </p>
    </div>
  </body>
</html>