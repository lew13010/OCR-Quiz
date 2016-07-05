<?php
if(isset($_POST['idQuiz'])){
    include_once ('modele/get_solution.php');
    $solutions = get_solutions($_POST);
    include_once ('modele/get_titre_quiz.php');
    $titre = get_titre_quiz($_POST['idQuiz']);
    include_once ('vue/solution.php');
}else{
    header('Location: index.php');
}