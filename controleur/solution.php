<?php
if(isset($_POST['idQuiz'])){
    for($i=1; $i <= 10;$i++){
        if(isset($_POST[$i])) {
            if(is_array($_POST[$i])){
                $reponse[$i] = null;
                $nb = count($_POST[$i]);
                for($j=0; $j<$nb; $j++){
                    if($j<($nb-1)){$separateur = ', ';}else{$separateur = '';};
                    $reponse[$i] = $reponse[$i].$_POST[$i][$j].$separateur;
                }
            }elseif(isset($_POST[$i]) && $_POST[$i] == '') {
                header('Location: index.php?p=quiz&id=' . $_POST['idQuiz']);
            }else{
                $reponse[$i] = $_POST[$i];
            }
        }else{
            $reponse[$i] = null;
        }
    }
    include_once ('modele/quiz.php');
    enregistrement_quiz($_SERVER["REMOTE_ADDR"], $_POST['idQuiz'], $reponse[1], $reponse[2], $reponse[3], $reponse[4], $reponse[5], $reponse[6], $reponse[7], $reponse[8], $reponse[9], $reponse[10]);

    include_once ('modele/get_solution.php');
    $solutions = get_solutions($_POST['idQuiz']);

    $titre = get_titre_quiz($_POST['idQuiz']);
    $compteurQuestion = 0;
    $score = 0;
    include_once ('vue/solution.php');
}else{
    header('Location: index.php');
}