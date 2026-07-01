<?php
require_once 'config/database.php';
require_once 'models/Atendimento.php';

class AtendimentoController {public function index() {
        $db = Database::getConnection();
        $atendimentoModel = new Atendimento($db);

        $atendimentos = $atendimentoModel->listarTodos();

        require 'views/home.php';
    }

    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome_pet = $_POST['nome_pet'];
            $idade_pet = $_POST['idade_pet'];
            $servico = $_POST['servico'];
            $data_servico = $_POST['data_servico'];
            $hora_servico = $_POST['hora_servico'];

            $foto = $_FILES['foto']['name'];
            $caminho_destino = "assets/uploads/" . basename($foto);

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_destino)) {
                                
                $db = Database::getConnection();
                $atendimentoModel = new Atendimento($db);
                $atendimentoModel->cadastrar($nome_pet, $idade_pet, $servico, $data_servico, $hora_servico, $foto);
            }
            header('Location: index.php');
            
            exit;
        }
    }
}
?>