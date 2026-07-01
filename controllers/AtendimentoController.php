<?php
require_once 'config/database.php';
require_once 'models/Atendimento.php';

class AtendimentoController {
        public function index() {
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

    public function excluir() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $origem = isset($_GET['origem']) ? $_GET['origem'] : 'home';

        if ($id) {
            $db = Database::getConnection();
            $atendimentoModel = new Atendimento($db);
            $atendimentoModel->excluir($id);
        }

        if ($origem == 'dashboard') {
            header('Location: index.php?acao=dashboard');
        } else {
            header('Location: index.php');
        }
        exit;
    }

    public function loginTela() {
        require 'views/login.php';
    }

    public function loginAutenticar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            if ($usuario === 'admin' && $senha === '123') {
                if (session_status() === PHP_SESSION_NONE) session_start();
                $_SESSION['logado'] = true;
                header('Location: index.php?acao=dashboard');
                exit;
            } else {
                header('Location: index.php?acao=login_tela&erro=1');
                exit;
            }
        }
    }

    public function dashboard() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            header('Location: index.php?acao=login_tela');
            exit;
        }

        $db = Database::getConnection();
        $atendimentoModel = new Atendimento($db);
        $atendimentos = $atendimentoModel->listarTodos();
        require 'views/funcionario.php';
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}





?>