<h1>Mes quiz :</h1>
<ul>
    <?php
    foreach($myQuiz as $quiz){
        ?>
        <li><a href="index.php?p=my_quiz&id=<?php echo $quiz['id']; ?>"><?php echo $quiz['titre']; ?></a></li>
        <?php
    }
    ?>
</ul>
<p><a href="index.php">Retour à l'accueil</a></p>