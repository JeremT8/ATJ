<?php
require "models/jeu.php";

$page = (int) filter_input(INPUT_GET, "currentPage", FILTER_SANITIZE_NUMBER_INT) ?? 1;

$search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING) ?? "";

$pagination = [
    "numberPerPage" => 5,
    "totalNumberOfRows" => countJeu($search),
    "currentPage" => $page,
];

$pagination["numberOfPages"] = ceil($pagination["totalNumberOfRows"]/$pagination["numberPerPage"]);

if($pagination["numberOfPages"] < $page){
    $pagination["currentPage"] = 2;
}

$jeu = findJeu($pagination, $search);

echo render("jeu", [
    "jeuList" => $jeu,
    "pagination" => $pagination,
    "search" => $search
]);