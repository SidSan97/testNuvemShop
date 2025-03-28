<?php

class ProgrammingLogicResources {

    public function getSecondLargestValueFromArray(array $numbers): string
    {
        if (count($numbers) < 2) {
            http_response_code(403);
            return json_encode(["message" => "O array precisa ter no minimo 2 valores inteiros"]);
        }
    
        $value1 = $value2 = 0;
    
        foreach ($numbers as $x) {
            if ($x > $value2) {
                if ($x >= $value1) {
                    $value2 = $value1;
                    $value1 = $x;
                } else {
                    $value2 = $x;
                }
            }
        }
        //Essa solução é O(n) em tempo e O(2) em espaço
    
        http_response_code(200);
        return json_encode(["message" => "O segundo maior valor do array: $value2"]);
    }

    public function readCSVFile($file)
    {
        $data = [];

        if (($handle = fopen($file, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ';');

            while (($row = fgetcsv($handle, 0, ';')) !== false) {
                $data[] = array_combine($headers, $row);
            }

            fclose($handle);

        } else {
            http_response_code(500);
            return json_encode(["message" => "Não foi possivel abrir o arquivo CSV"]);
        }

        return $data;
    }
}