<?php

function countJeu(string $searchJeu){
    $searchJeuQuery = "";
    $params = [];
    if(! empty($searchJeu)){
        $searchJeuQuery = " WHERE titre= :searchJeu OR editeur= :searchJeu OR type_jeu= :searchJeu OR duree= :searchJeu";
        $params = ["searchJeu" => $searchJeu];
    } 

    $sql = "SELECT COUNT(*) as nb FROM jeu $searchJeuQuery ";

    
    $statement = getPDO()->prepare($sql);
    $statement->execute($params);
    $data = $statement->fetch();

    if($data !== false){
        return $data->nb;
    } else {
        return 0;
    }
}

function findJeu(array $paginationJeu, string $searchJeu){
    $sql = "SELECT * FROM jeu ";
    
    if(! empty($searchJeu)){
        $sql .= " WHERE titre= :searchJeu OR editeur= :searchJeu OR type_jeu= :searchJeu OR duree = :searchJeu";
    }

    $sql .= " LIMIT :limit OFFSET :offset";
    

    $offset = $paginationJeu["currentPage"] * $paginationJeu["numberPerPage"];
    $limit = $paginationJeu["numberPerPage"];

	

    $statement = getPDO()->prepare($sql);

    $statement->bindValue("limit", $limit, PDO::PARAM_INT);
    $statement->bindValue("offset", $offset, PDO::PARAM_INT);

    if(! empty($searchJeu)){
        $statement->bindValue("searchJeu", $searchJeu, PDO::PARAM_STR);
    }
    $statement->execute();
	
    return $statement->fetchAll();
}