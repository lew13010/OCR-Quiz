<?php
function get_titre_quiz($idQuiz){
    global $bdd;

    $req = $bdd->prepare('SELECT titre FROM quiz WHERE id=:idQuiz');
    $req->execute(array(':idQuiz' => $idQuiz));
    $titre = $req->fetchColumn();

    return $titre;
}