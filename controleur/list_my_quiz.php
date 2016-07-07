<?php
include_once ('modele/check_ip.php');
if(check_ip($_SERVER["REMOTE_ADDR"])){
    include_once ('modele/get_list_my_quiz.php');
    $myQuiz = get_list_my_quiz($_SERVER["REMOTE_ADDR"]);
    include_once ('vue/list_my_quiz.php');
}else{
    header('Location: index.php');
}