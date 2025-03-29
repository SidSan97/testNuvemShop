<?php

class IntegrationApiController extends RenderView {

    private $integrationApiServices;
    private $token;

    public function __construct()
    {
        $this->integrationApiServices = new IntergrationApiServices();
        $this->token = "70b3dd4e0e929d666dbf091a7a6c572430e67666889387a0b979418b38980fa0";
    }

    public function index()
    {
        $this->integrationApiServices->execute($this->token);
    }

    public function show(int $id)
    {
        $url = "show/$id";
        $this->integrationApiServices->execute($this->token, $url);
    }

    public function store()
    {
        $postData = file_get_contents("php://input");
        $data = json_decode($postData, true);
        $url = "create";
        $this->integrationApiServices->execute($this->token, $url, $data);
    }

    public function update(int $id)
    {
        $postData = file_get_contents("php://input");
        $data = json_decode($postData, true);
        $url = "update/$id";
        $this->integrationApiServices->execute($this->token, $url, $data);
    }

    public function delete(int $id)
    {
        $url = "delete/$id";
        $this->integrationApiServices->execute($this->token, $url);
    }
}