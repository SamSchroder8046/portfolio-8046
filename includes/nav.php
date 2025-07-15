<?php
include('../includes/functions.php');
$navLinks = generateNavLinks();
$navContent = <<<NAV
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../public/assets/images/favicon.png" width="40" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex gap-2">
                    {$navLinks}
                </ul>
            </div>
        </div>
    </nav>
NAV;
?>