<?php
include_once ('modele/exist_my_quiz.php');
if(isset($_GET['id']) && exist_my_quiz($_GET['id'])) {
    include_once ('modele/get_my_quiz.php');
    $myQuiz = get_my_quiz($_GET['id']);
    include_once ('modele/get_titre_quiz.php');
    $titre = get_titre_quiz($myQuiz['id_quiz']);
    include_once ('modele/get_questions.php');
    $questions = get_questions($myQuiz['id_quiz']);
    include_once ('modele/get_solution.php');
    $solutions = get_solutions($myQuiz['id_quiz']);
    include_once ('vue/my_quiz.php');
}else{
    header('Location: index.php');
}