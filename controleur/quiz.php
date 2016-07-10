<?php
include_once ('modele/quiz.php');
if(isset($_GET['id']) && exist_quiz($_GET['id'])) {
    include_once ('modele/get_questions.php');
    $questions = get_questions($_GET['id']);

    $titre = get_titre_quiz($_GET['id']);
    $compteurQuestion = 0;

    include_once('vue/quiz.php');
}else{
    header('Location: index.php');
}