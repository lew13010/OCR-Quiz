<?php
if(!empty($_GET['p'])){
    switch($_GET['p']){
        case 'quiz':
            include_once ('controleur/quiz.php');
            break;

        case 'validation':
            include_once ('controleur/solution.php');
            break;

        default:
            header('Location: index.php');
            break;
    }
}else{
    include_once ('modele/get_list_quiz.php');

    $quiz = get_list_quiz();

    foreach($quiz as $cle => $value){
        $quiz[$cle]['id'] = $value['id'];
        $quiz[$cle]['titre'] = $value['titre'];
    }

    include_once ('vue/index.php');
}
