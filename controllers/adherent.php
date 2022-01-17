<?php
require "models/adherent.php";

$page = filter_input(INPUT_GET, "currentPage", FILTER_SANITIZE_NUMBER_INT) ?? 1;

$search = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING) ?? "";

$pagination = [
    "numberPerPage" => 5,
    "totalNumberOfRows" => countAdherent($search),
    "currentPage" => $page,
];

$pagination["numberOfPages"] = ceil($pagination["totalNumberOfRows"]/$pagination["numberPerPage"]);

if($pagination["numberOfPages"] < $page){
    $pagination["currentPage"] = 2;
}

$adherent = findAdherent($pagination, $search);

echo render("adherent", [
    "adherentList" => $adherent,
    "pagination" => $pagination,
    "search" => $search
]);