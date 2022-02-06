<?php
// Notre class
    class Myclass{
    // Les propriete de notre class
        private $api_url;   
    // Contructeur de notre classe
        function __construct($p_api_url) {
            $this->api_url = $p_api_url;
        }
    // Fonction  pour recuperer les donnees de l'api via sa methode et son url
        function API_CALL($method, $data = false){
        // les valeurs de notre header
            $headers = array(
                "Content-Type: application/json"
            );
            $curl = curl_init();
            // Switch sur les différents method GET, POST, PUT, et DELETE
                switch ($method)
                {
                    case "POST":
                        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($curl, CURLOPT_POST, 1);
                    // Si ya des données envoye alors on enregistre cela
                        if ($data){
                            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        } 
                        break;
                    case "PUT":
                        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($curl, CURLOPT_PUT, 1);
                        // Si ya des données envoye alors on enregistre cela
                        if ($data){
                            //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                        } 
                        break;
                    default:
                        // Si ya des données envoye alors on enregistre cela
                        if ($data){
                            $url = sprintf("%s?%s", $this->api_url, http_build_query($data));
                        }      
                }
                curl_setopt($curl, CURLOPT_URL, $this->api_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            // Le resultat de notre requete HTTP
                $result = curl_exec($curl);
            // ferme le  curl resource pour libere de la memoire
                curl_close($curl);
            // On retourne enfin notre  resultat json bien decoder qui va transformer le json en array php
                return json_decode($result, true);
        }

    }
?>