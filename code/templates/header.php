<?php 

$config = include __DIR__.'/../includes/config.php'; 

// Configurações padrões do template
$template = array_merge(['menu_atual' => null], $template);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= $config['app.url'].'/' ?>">
    <title><?= $template['title'] ?></title>

    <link rel="stylesheet" href="static/lib/bootstrap-5.3.3/css/bootstrap.min.css">

    <?php if (isset($template['styles']) && is_array($template['styles'])): ?>
        <?php foreach ($template['styles'] as $style): ?>
            <link rel="stylesheet" href="<?php echo htmlspecialchars($style); ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>

<?php if (!isset($template['esconder_menu']) || $template['esconder_menu'] !== true): ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de Vagas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= $template['menu_atual'] === 'consultar_vagas' ? 'active' : '' ?>" href="home.php">Consultar Vagas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $template['menu_atual'] === 'cadastrar_vaga' ? 'active' : '' ?>" href="cadastrar_vaga.php">Cadastrar Vaga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $template['menu_atual'] === 'remover_vaga' ? 'active' : '' ?>" href="remover_vaga.php">Remover Vaga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>

<!-- Main Content -->
<div class="container">
   