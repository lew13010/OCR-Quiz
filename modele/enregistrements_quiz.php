<?php
function enregistrement_quiz($ip, $idQuiz, $reponse1, $reponse2, $reponse3, $reponse4, $reponse5, $reponse6, $reponse7, $reponse8, $reponse9 ,$reponse10){
    global $bdd;

    $req = $bdd->prepare("INSERT INTO
                          enregistrements (adresse_ip, id_quiz, reponse1, reponse2, reponse3, reponse4, reponse5, reponse6, reponse7, reponse8, reponse9, reponse10)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $req->execute(array($ip, $idQuiz, $reponse1, $reponse2, $reponse3, $reponse4, $reponse5, $reponse6, $reponse7, $reponse8, $reponse9, $reponse10));
}