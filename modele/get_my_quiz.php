<?php
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