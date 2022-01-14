<?php

function countAdherent(string $search){
    $searchQuery = "";
    $params = [];
    if(! empty($search)){
        $searchQuery = " WHERE nom= :search OR prenom= :search OR email= :search OR code_postal=:search OR ville=:search OR date_souscription=:search";
        $params = ["search" => $search];
    } 

    $sql = "SELECT COUNT(*) as nb FROM adherent $searchQuery ";

    
    $statement = getPDO()->prepare($sql);
    $statement->execute($params);
    $data = $statement->fetch();

    if($data !== false){
        return $data->nb;
    } else {
        return 0;
    }
}

function findAdherent(array $pagination, string $search){
    $sql = "SELECT * FROM adherent ";
    
    if(! empty($search)){
        $sql .= "WHERE nom= :search OR prenom= :search OR email= :search OR code_postal=:search OR ville=:search OR date_souscription=:search ";
    }

    $sql .= "LIMIT :limit OFFSET :offset";
    

    $offset = $pagination["currentPage"] * $pagination["numberPerPage"];
    $limit = $pagination["numberPerPage"];

	

    $statement = getPDO()->prepare($sql);

    $statement->bindValue("limit", $limit, PDO::PARAM_INT);
    $statement->bindValue("offset", $offset, PDO::PARAM_INT);

    if(! empty($search)){
        $statement->bindValue("search", $search, PDO::PARAM_STR);
    }
	var_dump($statement);
    $statement->execute();
	
    return $statement->fetchAll();
}