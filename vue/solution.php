<h1>Resultats du test : <?php echo $titre;?></h1>
<?php
foreach($solutions as $solution){
    $compteurQuestion ++;
    ?>
    <h4><?php echo $solution['intitule'];?></h4>
    <p>Votre réponse :
        <?php
        if(!is_array($_POST[$compteurQuestion])){
            echo htmlspecialchars($_POST[$compteurQuestion]);
        }else{
            foreach($_POST[$compteurQuestion] as $value){
                echo ' - ' . htmlspecialchars($value);
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