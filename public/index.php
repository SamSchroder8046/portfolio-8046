<?php
include '../includes/header.php';
include '../includes/footer.php';

$bodyContent = <<<BODY
  <h1 class="text-center mt-4 text-primary-emphasis">Home</h1>
  <div class="body-container d-flex flex-column justify-content-center align-items-center">
    <div class="w-80 m-4 bg-white rounded border border-1 d-flex flex-lg-row flex-sm-column justify-content-around align-items-center">
      <img class="img-fluid img-thumbnail rounded-circle m-2 w-25" src="../public/assets/images/headshot2.JPEG" alt="headshot of the portfolio owner, Sam T. Schroder">
    </div>
    <p class="fs-2 m-4">Welcome to my portfolio site! <a href="projects.php">Click Here</a> to view any projects which I upload.</p>
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
  <body class="d-flex flex-column min-vh-100 bg-body-tertiary">
    {$headerContent}
    {$bodyContent}
    {$footerContent}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>
HTML;

echo $htmlContent;
?>