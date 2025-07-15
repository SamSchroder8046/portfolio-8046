<?php
include '../includes/header.php';
include '../includes/footer.php';

$bodyContent = <<<BODY
  <div class="body-container d-flex flex-column justify-content-center align-items-center bg-body-tertiary">
    <img class="img-fluid img-thumbnail rounded-circle mx-auto w-25 m-4" src="../public/assets/images/headshot2.JPEG" alt="headshot of the portfolio owner, Sam T. Schroder">
    <div>
      <p class="fs-2 m-4">Welcome to my portfolio site! <a href="projects.php">Click Here</a> to view any projects which I upload.</p>
    </div>
    <div class="card w-50 m-4">
      <div class="card-header">
        Quote
      </div>
      <div class="card-body">
        <figure>
          <blockquote class="blockquote">
            <p>"The best way to make something happen is to start yesterday."</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            <cite title="Source Title">Samuel T. Schroder</cite>
          </figcaption>
        </figure>
      </div>
    </div>
  </div>
BODY;

$htmlContent = <<<HTML
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.png">
  </head>
  <body class="d-flex flex-column min-vh-100">
    {$headerContent}
    {$bodyContent}
    {$footerContent}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
HTML;

echo $htmlContent;
?>