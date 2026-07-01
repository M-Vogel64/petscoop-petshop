<?php
require_once 'controllers/AtendimentoController.php';

$controlador = new AtendimentoController();

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'index';

switch ($acao) {
    case 'salvar':
        $controlador->salvar();
        break;

        case 'excluir':
        $controlador->excluir();
        break;

    case 'login_tela':
        $controlador->loginTela();
        break;

    case 'login_autenticar':
        $controlador->loginAutenticar();
        break;

    case 'dashboard':
        $controlador->dashboard();
        break;

    case 'logout':
        $controlador->logout();
        break;      
           
    case 'index':
    default:
        $controlador->index();
        break;
}
?>