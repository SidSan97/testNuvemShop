<?php

class ProductsModel extends Database {

    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function fetch(): string
    {
        $stmt = $this->pdo->query("SELECT * FROM produtos");

        if($stmt->rowCount() === 0) {
            http_response_code(200);
            return json_encode(["message" => "Nenhum produto cadastrado"]);
        }

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        return json_encode($data);
    }

    public function fetchById(int $id): string
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);

        if($stmt->rowCount() === 0) {
            http_response_code(404);
            return json_encode(["message" => "Produto não encontrado"]);
        }

        http_response_code(200);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public function checkIfProductExists(string $name): bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE nome = ?");
        $stmt->bindParam(':nome', $name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount() === 0 ? false : true;
    }

    public function insert(array $data): string
    {
        if (empty($data)) {
            http_response_code(403);
            return json_encode(["message" => "Cadastro de produto inválido."]);
        }

        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("
                INSERT INTO produtos (nome, descricao, preco, estoque, created_at)
                VALUES (:nome, :descricao, :preco, :estoque, :created_at)
            ");

            $stmt->bindParam(':nome', $data['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $data['descricao'], PDO::PARAM_STR);
            $data['preco'] = number_format((float)$data['preco'], 2, '.', '');
            $stmt->bindParam(':preco', $data['preco'], PDO::PARAM_STR);
            $stmt->bindParam(':estoque', $data['estoque'], PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $data['created_at'], PDO::PARAM_STR);

            if(!$stmt->execute()) {
                $this->pdo->rollBack(); 
                http_response_code(500);
                return json_encode(["message" => "Erro ao cadastrar produto. Tente novamente mais tarde."]);
            }

            $this->pdo->commit();
            http_response_code(201);
            return json_encode(["message" => "Produto cadastrado com sucesso!"]);

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            http_response_code(500);
            return json_encode(["message" => "Erro ao cadastrar produto: " . $e->getMessage()]);
        }
    }

    public function update(array $data, int $id): string
    {
        if (empty($data)) {
            http_response_code(403);
            return json_encode(["message" => "Alteração de produto inválido."]);
        }

        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("UPDATE produtos 
                SET nome = :nome,  descricao = :descricao, preco = :preco, estoque = :estoque
                WHERE id = :id
            ");

            $stmt->bindParam(':nome', $data['nome'], PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $data['descricao'], PDO::PARAM_STR);
            $data['preco'] = number_format((float)$data['preco'], 2, '.', '');
            $stmt->bindParam(':preco', $data['preco'], PDO::PARAM_STR);
            $stmt->bindParam(':estoque', $data['estoque'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if(!$stmt->execute()) {
                $this->pdo->rollBack(); 
                http_response_code(500);
                return json_encode(["message" => "Erro ao alterar o produto. Tente novamente mais tarde."]);
            }

            $this->pdo->commit();
            http_response_code(201);
            return json_encode(["message" => "Produto alterado com sucesso!"]);

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            http_response_code(500);
            return json_encode(["message" => "Erro ao alterar o produto: " . $e->getMessage()]);
        }
    }

    public function delete(int $id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if($stmt->rowCount() === 0) {
                http_response_code(403);
                return json_encode(["message" => "Não foi possível excluir o produto. Produto inexistente"]);
            }

            http_response_code(201);
            return json_encode(["message" => "Produto excluído com sucesso!"]);

        } catch (PDOException $e) {
            http_response_code(500);
            return json_encode(["message" => "Erro ao excluir o produto: " . $e->getMessage()]);
        }
    }
}