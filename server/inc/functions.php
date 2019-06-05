<?php

function get_artists_and_albums(){
    include("connection.php");
    try{
        $results = $db->query(
            "SELECT id , name , genre
             FROM band"
             );
    }catch(Exception $e){
        echo "Unable to Retrieve";
        exit;
    }
    $results = $results->fetchAll(PDO::FETCH_ASSOC);
    for($i=0; $i<count($results); $i++){
    
        include("connection.php");
        $id = $results[$i]['id'];
        $albums = $db->query(
            "SELECT * from album WHERE 
            band_id = $id"
        );
        $albums = $albums->fetchAll(PDO::FETCH_ASSOC);
        $albums = array_map(function($array){
            return (object)$array;
        }, $albums);

        $results[$i]['albums']= $albums;
    }
    return $results;
} 

