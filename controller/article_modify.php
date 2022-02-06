<?php
// URL de l'API
    $api_url = 'https://apisymfonyblog.koko.best/api/articles/1';
// instantiation de notre classe
    include_once 'Myclass.php';
    $myclass = new Myclass($api_url);
// Fonction pour telecharge le fichier valider sur formulaire
    function download_file($uploaddir,$form_file_name){
        // Creer le dossier si il n existe pas
        if (!file_exists($uploaddir)) {
            mkdir($uploaddir, 0777, true);
        }
        // dans le cas ou le fichier existe deja on supprimer tous les fichiers present dedans avec les sous-dossiers c'est pour la gestion de memoire
        else{
            array_map('unlink', glob(''.$uploaddir.'*'));
        }
        $uploadfile = $uploaddir . basename($_FILES[$form_file_name]['name']);
        echo '<pre>';
        if (move_uploaded_file($_FILES[$form_file_name]['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé
                avec succès. Voici plus d'informations :\n";
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
                Voici plus d'informations :\n";
        }
        echo 'Voici quelques informations de débogage :';
        print_r($_FILES);
        echo '</pre>';
    }
// La date de maintenant
    $DateNow = date("Y-m-d H:i:s");
// Verification si tous les valeurs sont bien pris
/*     var_dump($DateNow); 
    echo('<br>');
    var_dump($_POST['num_article']); 
    echo('<br>');
    var_dump($_POST['title']);
    echo('<br>');
    var_dump($_POST['intro']);
    echo('<br>');
    var_dump($_FILES);
    echo('<br>'); */
// Point d arret
    //die();
// repertoire parent( repertoire de tous les photos)
    $base_dir = '../assets/img/photos/';
// repertoire du photo de l article
    $dir = $base_dir .''.$_POST['num_article'].'/';
    //var_dump($dir);
    // Telecharger le fichier avec son arborescence
    //download_file($dir,'picture');
    $article_post = ['Title' => $_POST['title'], 'Introduction' => $_POST['intro'], 'Description' => $_POST['intro'], 'LastMod' => $DateNow];
    $article_post_json_data = json_encode($article_post);
// Appel de la fonction pour récupérer les données en json et json_decode va le décoder en array PHP
    $api_result_modify = $myclass->API_CALL('PUT',$article_post_json_data);
    var_dump($api_result_modify);

?>