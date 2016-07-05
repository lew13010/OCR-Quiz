<?php
function get_questions($idQuiz){

    global $bdd;

    $req = $bdd->prepare("SELECT * FROM questions WHERE id_quiz = :idQuiz");
    $req->execute(array(':idQuiz' => $idQuiz));
    $questions = $req->fetchAll(PDO::FETCH_ASSOC);

    return $questions;
}