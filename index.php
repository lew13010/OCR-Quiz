<?php
require ('connexion.php');

$req = $bdd->query('SELECT * FROM quizz');
$quizz = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script   src="https://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Accueil Liste des Quizz</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Quizz disponibles :</h1>
        <ul>
        <?php
            foreach($quizz as $value){
                ?>
                <li><a href="quizz.php?id=<?php echo $value['id'];?>"><?php echo $value['titre'];?></a></li>
            <?php
            }
        ?>
        </ul>
    </div>
</div>
</body>
</html>