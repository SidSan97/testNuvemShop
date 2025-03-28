<?php

class SanitizeData {

    public function sanitize($data): array
    {
        $filteredData = [];

        foreach ($data as $key => $value) {
            switch ($key) {
                case 'nome':
                    $filteredData[$key] = htmlspecialchars($value); 
                    break;
                case 'descricao':
                    $filteredData[$key] = htmlspecialchars($value);
                    break;
                case 'preco':
                    $filteredData[$key] = filter_var($value, FILTER_VALIDATE_FLOAT);
                    break;
                case 'estoque':
                    $filteredData[$key] = filter_var($value, FILTER_VALIDATE_INT);
                    break;
                default:
                    $filteredData[$key] = $value; 
                    break;
            }
        }

        $filteredData['created_at'] = date('Y-m-d H:i:s');

        return $filteredData;
    }
}
