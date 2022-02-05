<?php

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();
// Switch sur les différents method GET, POST, PUT, et DELETE
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// Le résultat de notre requete HTTP
    $result = curl_exec($curl);

    curl_close($curl);
// On la retourne ici
    return $result;
}
// URL de l'API
    $api_url = 'https://apisymfonyblog.koko.best/api/articles';
// Appel de la fonction pour récupérer les données en json et json_decode va le décoder en array PHP
    $api_data_decoded = json_decode(CallAPI('GET', $api_url), true);
// Va afficher les données de cette variable avec son type
    //var_dump($api_data_decoded['hydra:member'][$i]['theme']['name']);
// die c est pour mettre un arret sur le code ca nous aide à voir ce qu'il ya dans nos variables avec le var_dump($mavariable)
    //die();
?>