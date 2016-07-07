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
    </div>
</div>
</body>
</html>