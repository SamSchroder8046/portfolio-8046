<?php
include_once ('../includes/functions.php');
$pagesContent = generateFooterLinks();
$footerContent = <<<HTML
<footer class="mt-auto">
<div class="p-1 d-flex justify-content-end flex-row align-items-center text-center text-primary-emphasis bg-primary-subtle border border-primary-subtle">
    <div class="d-flex justify-content-end flex-column border border-secondary p-2 rounded bg-body-tertiary">
        <p class="p-1">Pages:</p>
        {$pagesContent}
    </div>
</div>
</footer>
HTML
?>