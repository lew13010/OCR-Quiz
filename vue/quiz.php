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
        <h1><?php echo $titre;?></h1>
        <form action="index.php?p=validation" method="post" class="form">
            <div class="form-group">
                <?php
                foreach($questions as $question)
                {
                    $compteurQuestion ++;
                    ?>
                    <h4><?php echo $question['intitule'];?></h4>
                    <?php

                    include_once('modele/get_propositions.php');
                    $propositions = get_propositions($question['id']);

                    foreach ($propositions as $cle => $proposition) {
                        $propositions[$cle]['id'] = $proposition['id'];
                        $propositions[$cle]['reponses'] = $proposition['reponses'];
                        ?>
                        <div class="radio">
                            <label>
                                <input type="radio" name="<?php echo $compteurQuestion;?>" id="<?php echo $compteurQuestion;?>" value="<?php echo $proposition['reponses'];?>">
                                <?php echo $proposition['reponses']?>
                            </label>
                        </div>
                        <?php
                    }
                }
                ?>
                <input type="hidden" name="idQuiz" value="<?php echo $_GET['id'];?>">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>