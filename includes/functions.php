<?php

class Page {
    public $href;
    public $title;

    public function __construct($href, $title) {
        $this->href = $href;
        $this->title = $title;
    }
}

function getPagesArr () {
    $pages = array();
    foreach (new DirectoryIterator("../public/") as $file) {
        if ($file->getExtension() === "php") {
            $nameEnd = strpos($file->getFilename(), ".");
            $pageTitle = ucwords(substr($file->getFilename(), 0, $nameEnd), "-");
            $pageHref = "{$file->getFilename()}";
            array_push($pages, new Page($pageHref, $pageTitle));
        }
    }
    return $pages;
}

function generateFooterLinks () {
    $pagesContent = "";
    $pagesArr = getPagesArr();
    foreach ($pagesArr as $page) {
        if ($page->href != "index.php") {
            $pagesContent .= <<<PAGE
            <a class href="{$page->href}">{$page->title}</a>
            PAGE;
        } else {
            $pagesContent .= <<<PAGE
            <a class href="{$page->href}">Home</a>
            PAGE;
        }
    }
    return $pagesContent;
}

function generateNavLinks () {
    $navLinksContent = "";
    $pagesArr = getPagesArr();
    foreach ($pagesArr as $page) {
        if ($page->href != "index.php") {
            $navLinksContent .= <<<PAGE
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{$page->href}">{$page->title}</a>
                </li>
            PAGE;
        } else {
            $navLinksContent .= <<<PAGE
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{$page->href}">Home</a>
                </li>
            PAGE;
        }
    }
    return $navLinksContent;
}

function generateProjectCards ($filePath) {
    $projectsHtml = "";
    $rowHtml = "";
    $row = "";
    $card = "";
    $projectData = json_decode(file_get_contents($filePath));
    $count = 0;
    foreach ($projectData as $project=>$data) {
        if (empty($data->image_name)) {
            $imgSrc = "../public/assets/images/placeholder-image.jpg";
        } else {
            $imgSrc = "../public/assets/images/" . $data->image_name;
        }
        $title = ucwords($project, "_");
        $titleArr = explode("_", $title);
        $title = join(" ", $titleArr);
        $display = "";
        if (empty($data->deployed_link)) {
            $display = "display: none;";
        }
        $card = <<<CARD
            <div class="card project-card" style="width: 18rem;">
                <div class="w-100 h-100">
                    <img src="{$imgSrc}" class="card-img-top w-100 h-100" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{$title}</h5>
                    <p class="card-text">{$data->description}</p>
                </div>
                <div class="card-body d-flex flex-row justify-content-around align-items-end">
                    <a href="{$data->deployed_link}" class="card-link" style="{$display}">Deployed Site</a>
                    <a href="{$data->repo_link}" class="card-link">Project Repository</a>
                </div>
            </div>
        CARD;
        $projectsInRow = 3;
        if (floor($count / $projectsInRow) == $count / $projectsInRow && $count / $projectsInRow != 0) {
            $rowHtml = <<<ROW
                '<div class="project-row">{$row}</div><br/>'
            ROW;
            $projectsHtml .= $rowHtml;
            $row = "";
        }
        $row .= $card;
        $count ++;
    }
    $rowHtml = <<<ROW
        '<div class="project-row">{$row}</div><br/>'
    ROW;
    $projectsHtml .= $rowHtml;
    return $projectsHtml;
}
?>