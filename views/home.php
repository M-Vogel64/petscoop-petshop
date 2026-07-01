<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetsCoop - Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #f4effa;
        }
        .bg_primary{
            background-color: #b19cd9;
        }
        .text-primary {
            color: #8960b3;
}
        .btn-primary {
            background-color: #b19cd9;
            border-color: #b19cd9;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #967bb6; 
            border-color: #967bb6 ;
        }
        .card {
            border-color: #e5d9f2;
        }
    </style>
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm mb-4" style="background-color: #b19cd9;">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="index.php">PetScoop</a>
        <div class="ms-auto">
            <a href="index.php?acao=login_tela" class="btn btn-outline-light btn-sm">Área dos Funcionários</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="text-center text-primary mb-4">Agendamento de Serviços</h1>

    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h4 class="card-title mb-3">Novo Agendamento</h4>
            <form action="index.php?acao=salvar" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nome do Pet</label>
                        <input type="text" name="nome_pet" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Idade (anos)</label>
                        <input type="number" name="idade_pet" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Serviço</label>
                        <select name="servico" class="form-select" required>
                            <option value="Banho">Banho</option>
                            <option value="Tosa">Tosa</option>
                            <option value="Consulta Veterinária">Consulta Veterinária</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Data</label>
                        <input type="date" name="data_servico" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Horário</label>
                        <input type="time" name="hora_servico" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto do Pet</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Agendar Serviço</button>
            </form>
        </div>
    </div>

    <h3 class="mb-3">Agendamentos Ativos</h3>
    <div class="row">
        <?php if (!empty($atendimentos)): ?>
            <?php foreach ($atendimentos as $pet): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="assets/uploads/<?= htmlspecialchars($pet['foto']) ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title"><?= htmlspecialchars($pet['nome_pet']) ?> (<?= $pet['idade_pet'] ?> anos)</h5>
                                <p class="card-text">
                                    <strong>Serviço:</strong> <?= htmlspecialchars($pet['servico']) ?><br>
                                    <strong>Data:</strong> <?= date('d/m/Y', strtotime($pet['data_servico'])) ?><br>
                                    <strong>Hora:</strong> <?= date('H:i', strtotime($pet['hora_servico'])) ?>
                                </p>
                            </div>
                            <a href="index.php?acao=excluir&id=<?= $pet['id'] ?>&origem=home" class="btn btn-outline-danger btn-sm w-100 mt-3" onclick="return confirm('Deseja realmente cancelar este agendamento?')">❌ Cancelar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info">Nenhum pet agendado ainda.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>