<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetScoop - Painel de Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f9f9;
        }
        .navbar-custom {
            background-color: #8cd3d1;
        }
        .text-custom {
            color: #3b8785;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #cce8e7;
        }
    </style>



</head>
<body class="bg-dark text-light">

<nav class="navbar navbar-expand-lg shadow-sm mb-4 navbar-custom">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="index.php?acao=dashboard">Painel do Funcionário</a>
        <div class="ms-auto">
            <a href="index.php?acao=logout" class="btn btn-danger btn-sm">Sair</a>
        </div>
    </div>
</nav>

<div class="container text-start">
    <h2 class="mb-4 text-custom">Controle de Atendimentos do Dia</h2>

    <div class="row">
        <?php if (!empty($atendimentos)): ?>
            <?php foreach ($atendimentos as $pet): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="assets/uploads/<?= htmlspecialchars($pet['foto']) ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title text-custom"><?= htmlspecialchars($pet['nome_pet']) ?> (<?= $pet['idade_pet'] ?> anos)</h5>
                                <p class="card-text text-secondary">
                                    <strong>Serviço:</strong> <?= htmlspecialchars($pet['servico']) ?><br>
                                    <strong>Data:</strong> <?= date('d/m/Y', strtotime($pet['data_servico'])) ?><br>
                                    <strong>Hora:</strong> <?= date('H:i', strtotime($pet['hora_servico'])) ?>
                                </p>
                            </div>
                            <a href="index.php?acao=excluir&id=<?= $pet['id'] ?>&origem=dashboard" class="btn btn-success btn-sm w-100 mt-3">✓ Concluir Atendimento</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-success" style="background-color: #e0f4f3; border-color: #cce8e7; color: #3b8785;">
                    Nenhum atendimento agendado pendente.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>