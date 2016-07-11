<h1><?php echo $titre ?></h1>
<?php
$compteur = 0;
$score = 0;
foreach($questions as $question){
    ?>
    <h4><?php echo $question['intitule'];?></h4>
    <p>La bonne réponse était : <?php echo $solutions[$compteur]['reponses']; ?></p>
    <p>Votre réponse était : <?php echo $myQuiz['reponse'.($compteur+1)]; ?></p>
    <?php
    if($solutions[$compteur]['reponses'] == $myQuiz['reponse'.($compteur+1)]){
        $score ++;
    }
    $compteur++;
}
?>
<h3>Votre score est de : <?php echo round(($score/$compteur)*100);?>%</h3>
<a href="index.php?p=list_my_quiz">Retour à ma liste de quiz</a><br>
<a href="index.php">Retour à l'accueil</a>