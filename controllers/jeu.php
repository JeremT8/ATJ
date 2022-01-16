<?php
require "models/jeu.php";

$page = (int) filter_input(INPUT_GET, "currentPage", FILTER_SANITIZE_NUMBER_INT) ?? 1;

$searchJeu = filter_input(INPUT_GET, "searchJeu", FILTER_SANITIZE_STRING) ?? "";

$paginationJeu = [
    "numberPerPage" => 5,
    "totalNumberOfRows" => countJeu($searchJeu),
    "currentPage" => $page,
];

$paginationJeu["numberOfPages"] = ceil($paginationJeu["totalNumberOfRows"]/$paginationJeu["numberPerPage"]);

if($paginationJeu["numberOfPages"] < $page){
    $paginationJeu["currentPage"] = 2;
}

$jeu = findJeu($paginationJeu, $searchJeu);

echo render("jeu", [
    "jeuList" => $jeu,
    "paginationJeu" => $paginationJeu,
    "searchJeu" => $searchJeu
]);