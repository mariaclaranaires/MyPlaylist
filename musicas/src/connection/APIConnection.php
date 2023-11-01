<?php
namespace connection;

class APIConnection {
    private $baseUrl = "http://localhost:8001";

    public function requestApi($url, $method, $data = null) {
        $requisicao = curl_init();
        $fullUrl = $this->baseUrl . $url;
      

        curl_setopt($requisicao, CURLOPT_URL, $fullUrl);
        curl_setopt($requisicao, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($requisicao, CURLOPT_POSTFIELDS, $data);
        curl_setopt($requisicao, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        if ($method === "POST") { 
            curl_setopt ($requisicao, CURLOPT_POST, 1);
        } elseif ($method === "GET"){
            curl_setopt ($requisicao, CURLOPT_HTTPGET, 1);
        }else{
            $error_message = "Método não permitido";
            return $error_message;
        }

        $response = curl_exec($requisicao);
        
		if( $response === false )
			syslog(LOG_INFO , curl_error($require));

		return $response;
    }
}