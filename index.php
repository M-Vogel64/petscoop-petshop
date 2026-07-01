<?php
require_once 'controllers/AtendimentoController.php';

$controlador = new AtendimentoController();

$acao = isset($_GET['acao']) ? $_GET['acao'] : 'index';

switch ($acao) {
    case 'salvar':
        $controlador->salvar();
        break;
        
    case 'index':
    default:
        $controlador->index();
        break;
}
?>