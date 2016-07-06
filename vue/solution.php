<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Liste des Quiz</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Resultats du test : <?php echo $titre;?></h1>
        <?php
        foreach($solutions as $solution){
            $compteurQuestion ++;
            ?>
            <h4><?php echo $solution['intitule'];?></h4>
            <p>Votre réponse :
                <?php
                if(!is_array($_POST[$compteurQuestion])){
                    echo $_POST[$compteurQuestion];
                }else{
                    foreach($_POST[$compteurQuestion] as $value){
                        echo ' - ' . $value;
                    }
                }
                ?></p>
            <h5>
                <?php
                if(!is_array($_POST[$compteurQuestion])) {
                    if ($_POST[$compteurQuestion] == $solution['reponses']) {
                        echo 'Bonne réponse';
                        $score++;
                    } else {
                        echo 'La bonne réponse etait : ' . $solution['reponses'];
                    }
                }else {
                    $checkbox = count($_POST[$compteurQuestion]);
                    $reponse='';
                    for($i=0; $i < $checkbox; $i++){
                        if($i < ($checkbox-1)){$virgule = ', ';}else{$virgule ='';};
                        $reponse = $reponse . $_POST[$compteurQuestion][$i]. $virgule;
                    }
                    if ($reponse == $solution['reponses']) {
                        echo 'Bonne réponse';
                        $score++;
                    } else {
                        echo 'La bonne réponse etait : ' . $solution['reponses'];
                    }
                }?>
            </h5>
        <?php

        }
        ?>
        <h3>Votre score est de : <?php echo round(($score/$compteurQuestion)*100);?>%</h3>
        <a href="index.php">Retour à l'accueil</a>
    </div>
</div>
</body>
</html>