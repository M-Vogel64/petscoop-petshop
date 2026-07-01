<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetsCoop - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-secondary d-flex align-items-center" style="height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Login Funcionário</h3>
                    
                    <?php if (isset($_GET['erro'])): ?>
                        <div class="alert alert-danger text-center py-2">Usuario ou senha incorretos</div>
                    <?php endif; ?>

                    <form action="index.php?acao=login_autenticar" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" name="senha" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-2">Entrar</button>
                        <a href="index.php" class="btn btn-link w-100 text-center text-muted text-decoration-none">Voltar para Home</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>