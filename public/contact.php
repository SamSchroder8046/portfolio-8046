<?php
include '../includes/header.php';
include '../includes/footer.php';

$bodyContent = <<<BODY
    <h1 class="text-center">Contact</h1>
    <div class="d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column justify-content-center align-items-center bg-white border border-1 w-50 m-4 p-4" style="min-width: 320px;">
            <p>As of September 2025, I am a 2nd year Software Engineering Student at LJMU.</p>
            <p>My interests are:</p>
            <ul>
                <li>Web Development</li>
            </ul>
            <br/>
            <p>Topics I hope to explore in the future:</p>
            <ul>
                <li>Artificial Intelligence</li>
                <li>Automation</li>
            </ul>
            <br/>
            <p>I am open for contact. If you have any questions, please don't hesitate!</p>
            <p>Contact:</p>
            <ul>
                <li>Email: <a href="mailto:tkinternodequery@gmail.com">tkinternodequery@gmail.com</a></li>
                <li><div style="width: 100%; display: flex; justify-content: space-between; align-items: center"><p>GitHub (SamSchroder8046): </p><a href="https://github.com/SamSchroder8046?tab=repositories" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="width: 50px; height: auto; margin-left: 20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg></a></div></li>
                <li><div style="width: 100%; display: flex; justify-content: space-between; align-items: center"><p>GitHub (SamSchroder123): </p><a href="https://github.com/SamSchroder123?tab=repositories" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="width: 50px; height: auto; margin-left: 20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg></a></div></li>
            </ul>
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