<?php
header('Content-Type: application/json');

class NotFoundController {

    public function index()
    {
        http_response_code(404);
        echo json_encode(["message" => "URL inválida"]);
    }
}