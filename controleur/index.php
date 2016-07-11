<?php
include_once ('vue/header.inc.php');

if(!empty($_GET['p'])){
    switch($_GET['p']){
        case 'quiz':
            include_once ('controleur/quiz.php');
            break;

        case 'validation':
            include_once ('controleur/solution.php');
            break;

        case 'list_my_quiz':
            include_once ('controleur/list_my_quiz.php');
            break;

        case 'my_quiz':
            include_once ('controleur/my_quiz.php');
            break;

        default:
            header('Location: index.php');
            break;
    }
}else{
    include_once ("modele/check_ip.php");
    include_once ('modele/quiz.php');

    $quiz = get_list_quiz();

    foreach($quiz as $cle => $value){
        $quiz[$cle]['id'] = $value['id'];
        $quiz[$cle]['titre'] = $value['titre'];
    }

    include_once ('vue/index.php');
}

include_once ('vue/footer.inc.php');