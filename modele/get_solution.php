<?php
function get_solutions(array $post){
    global $bdd;

    $req = $bdd->query("SELECT intitule, reponses FROM quiz
                        LEFT JOIN questions
                          ON id_quiz = quiz.id
                        LEFT JOIN propositions
                          ON id_question = questions.id
                        WHERE quiz.id = ".$post['idQuiz']."
                        AND correct = 'Y'");
    $solutions = $req->fetchAll(PDO::FETCH_ASSOC);
    return $solutions;
}