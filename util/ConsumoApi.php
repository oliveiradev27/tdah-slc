<?php
    /**
     * Classe responsavél pelo consumo de APIs de terceiros
     */
    class ConsumoApi
    {
        private static $curl;
        
        function __construct()
        {
            $this->curl = curl_init();
            curl_setopt($curl, 'CURLOPT_POST', true);
            curl_setopt($curl, 'CURLOPT_TIMEOUT', 60);
            curl_setopt($curl, 'CURLOPT_CONNECTTIMEOUT', 15);
        }

        public function get($url)
        {           
            $conteudo = file_get_contents($url);
            return $conteudo;
        }
    }
 ?>