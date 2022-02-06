<!--Dans ce formulaire on va deja charger les donnees de l article concerne-->
<form enctype="multipart/form-data" method="POST" action="../controller/article_modify.php" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input id = "num_article" type="hidden" name="num_article" value="<?= $_GET['num'] ?>">
    <!--Affichage de notre titre dans un input-->
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" 
        placeholder=" Your Title" value="<?php echo(VerifVariableNull($article['Title'],'')); ?>" name = "title" required
      >
      <div class="invalid-tooltip">
        Please enter a title
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <input id = "num_article" type="hidden" name="num_article" value="<?= $_GET['num'] ?>">
      <label for="title">Last Modification(LastMod) </label>
    <!--On va changer la date de type string en date de format Y-m-d-->
      <?php
        // Creation du timestamp(nb de second ecoule) via la date en string
        $timestamp = strtotime($article['LastMod']);
        // Creation d une nouv date format grace au nb de seconds( ici on prend la var timestamp)
        $new_date = date("Y-m-d", $timestamp);
      ?>
    <!--Afficher notre date-->
      <input type="date" class="form-control" id="lastmod" 
        placeholder=" Your date of modification" value="<?php echo(VerifVariableNull($new_date,'')); ?>" name = "lastmod" required
      >
      <div class="invalid-tooltip">
        Please enter a valid date
      </div>
    </div>
    <div class="col-md-4 mb-3 custom-file">
        <input type="file" name="fileToUpload" id="fileToUpload" 
        value = "<?php echo(VerifVariableNull($article['Image'],'')); ?>" required data-validation-required-message="Please choose a valide picture"> 
    </div>
    <div class="col-md-4 mb-3 custom-file">
      <label for="theme">Theme</label>
      <select class="form-control">
    <!--Boucle pour nos themes on affiche l option selected si dans le cas ca coincide avec l id du theme de l article concerne-->
      <?php  if((VerifVariableNull($themes['hydra:member'],'') != '')) { for ($i = 0; $i < count($themes['hydra:member']); $i++) {?>
        <?php
          if($article['theme']['id'] == $themes['hydra:member'][$i]['id']){
        ?>
            <option id = "<? VerifVariableNull($themes['hydra:member'][$i]['id'],''); ?>" selected>
                  <?php echo(VerifVariableNull($themes['hydra:member'][$i]['name'],'')); ?>
            </option>
        <?php }?>
        <?php if($article['theme']['id'] != $themes['hydra:member'][$i]['id']){ ?>
            <option id = "<? VerifVariableNull($themes['hydra:member'][$i]['id'],''); ?>">
                  <?php echo(VerifVariableNull($themes['hydra:member'][$i]['name'],'')); ?>
            </option>
        <?php } ?>
      <?php }}?> 
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Introduction</label>
    <!--Afficher notre introduction dans un textarea-->
      <textarea type="textarea" class="form-control" id="validationTooltip02" 
        placeholder="Your introduction" value="Otto" name = "intro" required>
          <?php echo(VerifVariableNull($article['Introduction'],'')); ?>
      </textarea>
      <div class="invalid-tooltip">
        Please enter an intro
      </div>
    </div>
  <button class="btn btn-primary" type="submit">Modifier</button>
</form>