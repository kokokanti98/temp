<?php
// URL de l'API
    $api_url = 'https://apisymfonyblog.koko.best/api/articles';
// instantiation de notre classe
    include_once 'Myclass.php';
    $myclass = new Myclass($api_url);
// Fonction où dans le cas ou notre variable est null ou n'existe pas on va retourner une valeur par défaut dans le cas contraire ca retournera la variable non null
    function VerifVariableNull($variable, $default_value){
        if(isset($variable) || !empty($variable)){
            return $variable;
        }
        else{
            return $default_value;
        }
    }
// Appel de la fonction pour récupérer les données en json et json_decode va le décoder en array PHP
    $api_data_decoded = $myclass->API_CALL('GET');
// Va afficher les données de cette variable avec son type
    //var_dump($api_data_decoded['hydra:member'][$i]['theme']['name']);
// die c est pour mettre un arret sur le code ca nous aide à voir ce qu'il ya dans nos variables avec le var_dump($mavariable)
    //die();
?>