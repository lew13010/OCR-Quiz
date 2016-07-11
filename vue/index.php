<h1>Quiz disponible :</h1>
<ul>
    <?php
    foreach($quiz as $value)
    {
        ?>
        <li><a href="index.php?p=quiz&id=<?php echo $value['id']?>"><?php echo $value['titre']?></a></li>
        <?php
    }
    if(check_ip($_SERVER["REMOTE_ADDR"])){
        ?>
        <a href="index.php?p=list_my_quiz">Voir mes quiz</a>
        <?php
    }
    ?>

</ul>