<?php
function enregistrement_quiz($ip, $idQuiz){
    global $bdd;

    $req = $bdd->prepare("INSERT INTO enregistrements (adresse_ip, id_quiz) VALUES (?, ?);");
    $req->execute(array($ip, $idQuiz));
}