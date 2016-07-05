<?php
function test_ip($ip, $idQuiz){
    global $bdd;
    $ip = $bdd->quote($ip);


    $req = $bdd->query("SELECT * FROM enregistrements WHERE adresse_ip=$ip AND id_quiz=$idQuiz");
    $res = $req->fetchAll();

    return $res;
}