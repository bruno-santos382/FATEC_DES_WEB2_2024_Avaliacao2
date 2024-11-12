<?php
require __DIR__.'/classes/login.php';
require __DIR__.'/classes/Cadastro.php';

$validador = new Login();
$cadastro = new Cadastro();

$validador->verificar_logado();
$vagas = $cadastro->consultarVagas();

?>

<?php 
    $template['title'] = 'Remover Vaga';
    $template['menu_atual'] = 'remover_vaga';
    $template['scripts'] = ['static/js/remover_vaga.js'];
    require __DIR__.'/templates/header.php'; 
?>

<h2 class="text-center my-4">Remover Vaga</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome da Empresa</th>
            <th scope="col">Número WhatsApp</th>
            <th scope="col">E-mail de Contato</th>
            <th scope="col">Descritivo da Vaga</th>
            <th scope="col">Curso</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>
       
        <?php foreach ($vagas as $vaga): ?>
            <tr>
                <td><?= htmlspecialchars($vaga['id'] ?? '') ?></td>
                <td><?= htmlspecialchars($vaga['nome_empresa'] ?? '') ?></td>
                <td><?= htmlspecialchars($vaga['numero_whatsapp'] ?? '') ?></td>
                <td><?= htmlspecialchars($vaga['email_contato'] ?? '') ?></td>
                <td><?= htmlspecialchars($vaga['descritivo_vaga'] ?? '') ?></td>
                <td><?= htmlspecialchars($vaga['curso'] ?? '') ?></td>
                <td class="text-center">
                    <button style="width: 100px" class="btn btn-danger btn-sm" onclick="removerVaga(this, <?= $vaga['id'] ?>)">Remover</button>
                </td>
            </tr>
        <?php endforeach; ?>

        <?php if (empty($vagas)): ?>
            <tr>
                <td colspan="100" class="text-center">Nenhum resultado encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php 
    require __DIR__.'/templates/footer.php'; 
?>