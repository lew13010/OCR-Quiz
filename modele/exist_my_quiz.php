<?php
function exist_my_quiz($id){
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM enregistrements WHERE id = :id');
    $req->execute(array(':id' => $id));
    $res = $req->fetchColumn();

    return $res;
}