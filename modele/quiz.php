<?php
function get_titre_quiz($idQuiz){
    global $bdd;

    $req = $bdd->prepare('SELECT titre FROM quiz WHERE id=:idQuiz');
    $req->execute(array(':idQuiz' => $idQuiz));
    $titre = $req->fetchColumn();

    return $titre;
}

function get_my_quiz($id){
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM questions
                          JOIN quiz
                            ON questions.id_quiz = quiz.id
                          JOIN enregistrements
                            ON enregistrements.id_quiz = quiz.id
                          WHERE enregistrements.id=:id");
    $req->execute(array(':id' => $id));

    $myQuiz = $req->fetch(PDO::FETCH_ASSOC);

    return $myQuiz;
}

function get_list_quiz(){

    global $bdd;

    $req = $bdd->query('SELECT * FROM quiz');
    $quiz = $req->fetchAll(PDO::FETCH_ASSOC);

    return $quiz;
}

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

function exist_quiz($idQuiz){
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM quiz WHERE id = :idQuiz');
    $req->execute(array(':idQuiz' => $idQuiz));
    $res = $req->fetchColumn();

    return $res;
}

function exist_my_quiz($id){
    global $bdd;

    $req = $bdd->prepare('SELECT * FROM enregistrements WHERE id = :id');
    $req->execute(array(':id' => $id));
    $res = $req->fetchColumn();

    return $res;
}

function enregistrement_quiz($ip, $idQuiz, $reponse1, $reponse2, $reponse3, $reponse4, $reponse5, $reponse6, $reponse7, $reponse8, $reponse9 ,$reponse10){
    global $bdd;

    $req = $bdd->prepare("INSERT INTO
                          enregistrements (adresse_ip, id_quiz, reponse1, reponse2, reponse3, reponse4, reponse5, reponse6, reponse7, reponse8, reponse9, reponse10)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $req->execute(array($ip, $idQuiz, $reponse1, $reponse2, $reponse3, $reponse4, $reponse5, $reponse6, $reponse7, $reponse8, $reponse9, $reponse10));
}