<?php
function check_ip($ip){
    global $bdd;
    $ip = $bdd->quote($ip);


    $req = $bdd->query("SELECT * FROM enregistrements WHERE adresse_ip=$ip");
    $res = $req->fetchColumn();

    return $res;
}