<?php 
class Atendimento{
    private $conn;
    private $table = "atendimentos";

    public function __construct($db)
    {
        $this->conn = $db;
    
    
    }

    public function cadastrar($nome_pet, $idade_pet, $servico, $data_servico, $hora_servico, $foto){
        $query = "INSERT INTO " . $this->table . " 
                  (nome_pet, idade_pet, servico, data_servico, hora_servico, foto) 
                  VALUES (:nome_pet, :idade_pet, :servico, :data_servico, :hora_servico, :foto)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome_pet", $nome_pet);
        $stmt->bindParam(":idade_pet", $idade_pet);
        $stmt->bindParam(":servico", $servico);
        $stmt->bindParam(":data_servico", $data_servico);
        $stmt->bindParam(":hora_servico", $hora_servico);
        $stmt->bindParam(":foto", $foto);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    
    }
        
public function listarTodos() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY data_servico ASC, hora_servico ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluir($id) {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    
    if ($stmt->execute()) {
        return true;
    }
    return false;
}
}

