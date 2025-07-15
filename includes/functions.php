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
                <li class="nav-item ms-lg-auto mx-sm-auto bg-info-subtle rounded w-50">
                    <a class="nav-link active mx-3" aria-current="page" href="{$page->href}">{$page->title}</a>
                </li>
            PAGE;
        } else {
            $navLinksContent .= <<<PAGE
                <li class="nav-item ms-lg-auto mx-sm-auto bg-info-subtle rounded w-50">
                    <a class="nav-link active mx-3" aria-current="page" href="{$page->href}">Home</a>
                </li>
            PAGE;
        }
    }
    return $navLinksContent;
}

function generateProjectCards ($filePath) {
    $projectsHtml = '<div class="d-flex justify-content-center align-items-center"><div class="projects-grid">';
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
            <div class="card project-card bg-white p-2">
                <div class="w-100 h-100">
                    <img src="{$imgSrc}" class="card-img-top w-100 border-bottom border-black" alt="image for {$project} project." style="height: 200px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{$title}</h5>
                    <p class="card-text">{$data->description}</p>
                </div>
                <div class="project-links card-body d-flex flex-row justify-content-around align-items-center bg-white rounded w-100">
                    <a href="{$data->deployed_link}" class="card-link h-75 m-2 border border-1 rounded p-2 bg-body-tertiary text-center" style="{$display} max-width: 150px;">Deployed Site</a>
                    <a href="{$data->repo_link}" class="card-link h-75 m-2 border border-1 rounded p-2 bg-body-tertiary text-center" style="max-width: 150px;">Project Repository</a>
                    <span class="d-flex flex-column justify-content-around align-items-center p-1 h-100 border-start border-1 ms-auto" style="max-width: 45px; min-width: 45px;">
                        <p class="text-end w-100 h-100 ms-auto me-1" style="font-size: 10px;">GitHub:</p>
                        <a class="card-link ms-auto" href="https://github.com/{$data->github_username}?tab=repositories}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 m-0" style="width: 30px; height: auto;"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" /></svg></a>
                    </span>
                </div>
            </div>
        CARD;
        $projectsHtml .= $card;
        // $projectsInRow = 3;
        // if (floor($count / $projectsInRow) == $count / $projectsInRow && $count / $projectsInRow != 0) {
        //     $rowHtml = <<<ROW
        //         '<div class="project-row">{$row}</div><br/>'
        //     ROW;
        //     $projectsHtml .= $rowHtml;
        //     $row = "";
        // }
        // $row .= $card;
        // $count ++;
    }
    $rowHtml = <<<ROW
        '<div class="project-row">{$row}</div><br/>'
    ROW;
    // $projectsHtml .= $rowHtml;
    $projectsHtml .= "</div></div>";
    return $projectsHtml;
}
?>