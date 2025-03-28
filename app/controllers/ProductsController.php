<?php

class ProductsController extends RenderView{

    private $productModel;
    private $sanitizeData;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
        $this->sanitizeData = new SanitizeData();
    }

    public function index()
    {
        $this->loadView('home', [
            'product'  => $this->productModel->fetch()
        ]);
    }

    public function show(int $id)
    {
        $this->loadView('home', [
            'product' => $this->productModel->fetchById($id)
        ]);
    }

    public function store()
    {
        $postData = file_get_contents("php://input");
        $data = json_decode($postData, true);

        $data = $this->sanitizeData->sanitize($data);
        
        $this->loadView('home', [
            'product'  => $this->productModel->insert($data)
        ]);
    }

    public function update(int $id)
    {
        $putData = file_get_contents("php://input");
        $data = json_decode($putData, true);

        $data = $this->sanitizeData->sanitize($data);
        
        $this->loadView('home', [
            'product'  => $this->productModel->update($data, $id)
        ]);
    }

    public function delete(int $id)
    {
        $this->loadView('home', [
            'product' => $this->productModel->delete($id)
        ]);
    }
}