<?php

class IntergrationApiServices {

    public function execute(string $token, $url = null, $data = null)
    {
        $url = "https://admin.agenciacake.com.br/Testedev/$url";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $token",
            "Content-Type: application/json"
        ]);

        if($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Erro: " . curl_error($ch);
        } else {
            echo $response;
        }

        curl_close($ch);
    }
}