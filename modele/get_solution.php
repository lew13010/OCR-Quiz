<?php
function get_solutions($post){
    global $bdd;

    $req = $bdd->query("SELECT intitule, reponses FROM quiz
                        LEFT JOIN questions
                          ON id_quiz = quiz.id
                        LEFT JOIN solutions
                          ON id_question = questions.id
                        WHERE quiz.id=$post");
    $solutions = $req->fetchAll(PDO::FETCH_ASSOC);
    return $solutions;
}