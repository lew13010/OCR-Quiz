<?php
require ('connexion.php');

if(isset($_GET['id']) && $_GET['id'] != ''){
    $idQuizz = $_GET['id'];

    $req = $bdd->prepare("SELECT * FROM questions WHERE id_quizz = :idQuizz");
    $req->execute(array(':idQuizz' => $idQuizz));
    $questions = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();

    $req = $bdd->prepare("SELECT * FROM propositions WHERE id_question = :idQuestion ");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Quizz</title>
</head>
<body>
<div class="container">
    <div class="row">
        <form action="validation_quizz.php" method="post">
        <?php
        $i = 0; // Compteur de questions.
            foreach($questions as $question){
                $i++
                ?>
                <h4><?php echo $question['intitule'] ?></h4>

                <?php
                $idQuestion = $question['id'];
                $req->execute(array(':idQuestion' => $idQuestion));
                $propositions = $req->fetchAll(PDO::FETCH_ASSOC);
                foreach($propositions as $proposition) {
                    ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="question<?php echo $i?>" id="question<?php echo $i?>" value="<?php echo $proposition['id']?>" >
                        <?php echo $proposition['reponses']?>
                    </label>
                </div>
                    <?php
                }
                echo '<hr>';
            }
            $req->closeCursor();
        ?>
            <input type="hidden" name="id" value="<?php echo $idQuizz?>">
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-default">Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<?php
    }else{
        header('Location: index.php');
    }
?>