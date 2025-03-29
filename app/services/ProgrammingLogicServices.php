<?php

class ProgrammingLogicServices {

    private $productModel;
    private $sanitizeData;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
        $this->sanitizeData = new SanitizeData();
    }

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
        $noInserted = [];

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

        foreach ($data as $item) {
            $dataFiltered = $this->sanitizeData->sanitize($item);
            $send = $this->productModel->insert($dataFiltered, true);

            if($send === true) {
                array_push($noInserted, $item['nome']);
            }
        }

        if(!empty($noInserted)) {
            $noInserted = implode(',', $noInserted);
            http_response_code(207);
            return json_encode(["message" => "Os seguintes produtos não foram cadastrado por já terem sido cadastrados anteriormente: $noInserted"]);
        } 

        http_response_code(201);
        return json_encode(["message" => "Produtos cadastrados com sucesso"]);
    }
}