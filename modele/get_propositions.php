<?php
function get_propositions($idQuestion){

    global $bdd;

    $req = $bdd->prepare("SELECT id, reponses FROM propositions WHERE id_question = :idQuestion");
    $req->execute(array(':idQuestion' => $idQuestion));
    $propositions = $req->fetchAll(PDO::FETCH_ASSOC);

    return $propositions;
}