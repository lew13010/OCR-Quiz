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
    </div>
</div>
</body>
</html>