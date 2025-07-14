<?php
$development = true;
$pathPrefix = "";
if($development) {
    $pathPrefix = "homeProjects/portfolio-8046/";
}
$pages = array();
$pagesContent = "";
foreach (new DirectoryIterator("../public/") as $file) {
    if ($file->getExtension() === "php") {
        $nameEnd = strpos($file->getFilename(), ".");
        $pageName = substr($file->getFilename(), 0, $nameEnd);
        array_push($pages, $pageName);
    }
}
foreach ($pages as $page) {
    $pagesContent .= <<<PAGE
    <a class="p-0" href="{$page}.php">{$page}</a>
    PAGE;
}
$footerContent = <<<HTML
<footer>
<div class="fixed-bottom p-1 d-flex justify-content-end text-center text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
    <div class="d-flex justify-content-center flex-column border border-secondary rounded-3 p-2">
        <h4 class="p-2">Pages:</h4>
        {$pagesContent}
    </div>
</div>
</footer>
HTML
?>