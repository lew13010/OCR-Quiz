<?php
function exist_quiz($idQuiz){
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM quiz WHERE id = :idQuiz');
    $req->execute(array(':idQuiz' => $idQuiz));
    $res = $req->fetchColumn();

    return $res;
}