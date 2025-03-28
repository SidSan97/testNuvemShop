<?php

class ProgrammingLogicResources {

    public function getSecondLargestValueFromArray(array $numbers)
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
}