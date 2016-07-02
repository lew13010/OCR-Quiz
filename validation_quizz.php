<?php
require ('connexion.php');

if(isset($_POST['id']) && $_POST['id'] != ''){
    $idQuizz = $_POST['id'];

    $req = $bdd->prepare("SELECT * FROM questions WHERE id_quizz = :idQuizz");
    $req->execute(array(':idQuizz' => $idQuizz));
    $questions = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();

    $reqReponse = $bdd->prepare("SELECT * FROM propositions WHERE id_question = :idQuestion AND id = :reponse");

    $reqSolution = $bdd->prepare("SELECT * FROM propositions WHERE id_question = :idQuestion AND correct = 'Y'");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Résultats</title>
</head>
<body>
<div class="container">
    <div class="row">
    <?php
    $nbQuestions = 0;
    $score = 0;
    foreach($questions as $question){
        $nbQuestions++;
        $reponses = $_POST['question'.$nbQuestions];
        ?>
        <h4><?php echo $question['intitule'] ?></h4>
        <?php
        $idQuestion = $question['id'];
        $reqSolution->execute(array(':idQuestion' => $idQuestion));
        $solutions = $reqSolution->fetchAll(PDO::FETCH_ASSOC);
        $reqSolution->closeCursor();

        $reqReponse->execute(array(':idQuestion' => $idQuestion,':reponse' => $reponses));
        $reponse = $reqReponse->fetch(PDO::FETCH_ASSOC);
        $reqReponse->closeCursor();
        foreach($solutions as $solution) {
            ?>
            <p>Votre reponse : <?php echo $reponse['reponses'];?></p>
            <?php
            if($reponse['reponses'] == $solution['reponses']){
                $score++;
                ?>
                <p>Bravo</p>
                <?php
            }else{
                ?>
                <p>Dommage</p>
                <p>La solution etait : <?php echo $solution['reponses'];?></p>
                <?php
            }
        }
}
    ?>
    <h3>Votre score est de :
    <?php echo round(($score / $nbQuestions) * 100, 2) . '%</h3>';
    echo '<br>';
    echo '<a href="index.php">Retour à l\'accueil</a>';
?>
<?php
}else{
    header('Location: index.php');
}
?>