<?php
function get_list_my_quiz($ip){
    global $bdd;

    $req = $bdd->prepare("SELECT  quiz.titre, enregistrements.id
                          FROM quiz
                          INNER JOIN enregistrements
                            ON enregistrements.id_quiz = quiz.id
                          WHERE adresse_ip=:ip");
    $req->execute(array(':ip'=>$ip));
    $myQuiz = $req->fetchAll(PDO::FETCH_ASSOC);

    return $myQuiz;
}