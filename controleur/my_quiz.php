<?php
include_once ('modele/quiz.php');
if(isset($_GET['id']) && exist_my_quiz($_GET['id'])) {
    $myQuiz = get_my_quiz($_GET['id']);
    $titre = get_titre_quiz($myQuiz['id_quiz']);

    include_once ('modele/get_questions.php');
    $questions = get_questions($myQuiz['id_quiz']);

    include_once ('modele/get_solution.php');
    $solutions = get_solutions($myQuiz['id_quiz']);

    include_once ('vue/my_quiz.php');
}else{
    header('Location: index.php');
}