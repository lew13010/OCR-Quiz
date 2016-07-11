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

            $ordre = 0;
            foreach ($propositions as $cle => $proposition) {
                $propositions[$cle]['id'] = $proposition['id'];
                $propositions[$cle]['reponses'] = $proposition['reponses'];
                if($question['type'] == 'radio') {
                    ?>
                    <div class="radio">
                        <label>
                            <input type="radio"
                                   name="<?php echo $compteurQuestion; ?>"
                                   id="<?php echo $compteurQuestion; ?>"
                                   value="<?php echo $proposition['reponses']; ?>"required>
                            <?php echo $proposition['reponses'] ?>
                        </label>
                    </div>
                    <?php
                }elseif($question['type'] == 'box'){
                    ?>
                    <div class="form-group checkbox options">
                        <label>
                            <input type="checkbox"
                                   name="<?php echo $compteurQuestion; ?>[]"
                                   id="<?php echo $compteurQuestion; ?>"
                                   value="<?php echo $proposition['reponses']; ?>" required>
                            <?php echo $proposition['reponses'] ?>
                        </label>
                    </div>
                    <?php
                }
                elseif($question['type'] == 'nombre'){
                    ?>
                    <div class="form-group">
                        <label>
                            <input type="text"
                                   name="<?php echo $compteurQuestion; ?>"
                                   id="<?php echo $compteurQuestion; ?>"
                                   required>
                        </label>
                    </div>
                    <?php
                }
                elseif($question['type'] == 'ordre'){
                    $ordre ++;
                    ?>
                    <div class="form-group">
                        <label for="<?php echo $compteurQuestion.'-'.$ordre; ?>"><?php echo $proposition['reponses']; ?>
                            <input class="form-control" type="text"
                                   name="<?php echo $compteurQuestion;?>[]"
                                   id="<?php echo $compteurQuestion.'-'.$ordre; ?>"
                                   value="<?php echo $ordre; ?>"
                                   maxlength="1"
                                   required ">
                        </label>
                    </div>
                    <?php
                }
            }
        }
        ?>
        <input type="hidden" name="adresseIP" value="<?php echo $_SERVER["REMOTE_ADDR"]?>">
        <input type="hidden" name="idQuiz" value="<?php echo $_GET['id'];?>">
        <button type="submit" id="quiz-send" class="btn btn-primary">Valider</button>
    </div>
</form>
<script>
    $(function(){
        var requiredCheckboxes = $('.options :checkbox[required]');
        requiredCheckboxes.change(function(){
            if(requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });

</script>