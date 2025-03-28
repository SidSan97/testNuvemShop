<?php

class ProductsModel extends Database {

    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function fetch()
    {
        $stmt = $this->pdo->query("SELECT * FROM produtos");

        if($stmt->rowCount() > 0) {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            http_response_code(200);
            return json_encode($data);

        }else {
            return json_encode(["message" => "Nenhum produto cadastrado"]);
        }
    }

    public function fetchById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);

        if($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return json_encode($data);

        }else {
            http_response_code(404);
            return json_encode(["message" => "Produto não encontrado"]);
        }
    }

    public function insert(array $data)
    {
        if(!$data) {
            http_response_code(403);
            return json_encode(["message" => "Cadastro de produto inválido."]);
        }

        $stmt = $this->pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque, created_at) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['nome'],
            $data['descricao'],
            $data['preco'],
            $data['estoque'],
            $data['created_at']
        ]);

        if ($stmt->rowCount() === 0) {
            http_response_code(500); 
            return json_encode(["message" => "Erro ao cadastrar produto. Tente novamente mais tarde."]);
        }

        http_response_code(201); 
        return json_encode(["message" => "Produto cadastrado com sucesso!"]);
    }

    public function update(array $data)
    {
        if(!$data) {
            http_response_code(403);
            return json_encode(["message" => "Cadastro de produto inválido."]);
        }

        $stmt = $this->pdo->prepare("UPDATE produtos SET (nome descricao, preco, estoque, created_at)");
        $stmt->execute([
            $data['nome'],
            $data['descricao'],
            $data['preco'],
            $data['estoque'],
            $data['created_at']
        ]);

        if ($stmt->rowCount() === 0) {
            http_response_code(500); 
            return json_encode(["message" => "Erro ao alterar o produto. Tente novamente mais tarde."]);
        }

        http_response_code(200); 
        return json_encode(["message" => "Produto alterado com sucesso!"]);
    }
}