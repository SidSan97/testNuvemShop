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

    public function show($id)
    {
        $this->loadView('home', [
            'product' => $this->productModel->fetchById($id)
        ]);
    }

    public function store()
    {
        $data = $this->sanitizeData->sanitize($_POST);
        
        $this->loadView('home', [
            'product'  => $this->productModel->insert($data)
        ]);
    }

    public function put()
    {
        $data = $this->sanitizeData->sanitize($_POST);
        
        $this->loadView('home', [
            'product'  => $this->productModel->update($data)
        ]);
    }
}