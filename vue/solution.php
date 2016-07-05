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
        $compteurQuestion = 0;
        $score = 0;
        foreach($solutions as $solution){
            $compteurQuestion ++;
            ?>
            <h4><?php echo $solution['intitule']?></h4>
            <p>Votre réponse : <?php echo $_POST[$compteurQuestion]?></p>
            <h5>
                <?php if($_POST[$compteurQuestion] == $solution['reponses']){
                    echo 'Bonne réponse'; $score++;
                }else{
                    echo 'La bonne réponses etait :'. $solution['reponses'];
                }?>
            </h5>
        <?php
        }
        ?>
        <h3>Votre score est de : <?php echo round(($score/$compteurQuestion)*100);?>%</h3>
    </div>
</div>
</body>
</html>