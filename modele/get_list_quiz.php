<?php
function get_list_quiz(){

    global $bdd;

    $req = $bdd->query('SELECT * FROM quiz');
    $quiz = $req->fetchAll(PDO::FETCH_ASSOC);

    return $quiz;
}