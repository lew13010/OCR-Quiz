<?php
if(isset($_POST['idQuiz'])){
    include_once ('modele/enregistrements_quiz.php');
    enregistrement_quiz($_SERVER["REMOTE_ADDR"], $_POST['idQuiz']);
    include_once ('modele/get_solution.php');
    $solutions = get_solutions($_POST);
    include_once ('modele/get_titre_quiz.php');
    $titre = get_titre_quiz($_POST['idQuiz']);
    $compteurQuestion = 0;
    $score = 0;
    include_once ('vue/solution.php');
}else{
    header('Location: index.php');
}