<?php
require __DIR__.'/classes/login.php';
$validador = new Login();
$validador->verificar_logado();

?>

<?php 
    $template['title'] = 'Cadastrar Vaga';
    $template['menu_atual'] = 'cadastrar_vaga';
    $template['scripts'] = ['static/js/cadastrar_vaga.js'];
    require __DIR__.'/templates/header.php'; 
?>

<h2 class="text-center my-4">Cadastrar Vaga</h2>
<form action="cadastrar_vaga.php" id="form_cadastro" method="POST">
    <div class="mb-3">
        <label for="nome_empresa" class="form-label">Nome da Empresa</label>
        <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" placeholder="Digite o nome da empresa" required>
    </div>

    <div class="mb-3">
        <label for="numero_whatsapp" class="form-label">Número WhatsApp</label>
        <input type="text" class="form-control" id="numero_whatsapp" name="numero_whatsapp" placeholder="Digite o número do WhatsApp" required>
    </div>

    <div class="mb-3">
        <label for="email_contato" class="form-label">E-mail de Contato</label>
        <input type="email" class="form-control" id="email_contato" name="email_contato" placeholder="Digite o e-mail de contato" required>
    </div>

    <div class="mb-3">
        <label for="descricao_vaga" class="form-label">Descritivo da Vaga</label>
        <textarea class="form-control" id="descricao_vaga" name="descricao_vaga" rows="4" placeholder="Descreva a vaga" required></textarea>
    </div>

    <div class="mb-3">
        <label for="curso" class="form-label">Curso</label>
        <select class="form-control" id="curso" name="curso" required>
            <option value="1">DSM</option>
            <option value="2">GE</option>
        </select>
    </div>

    <button type="submit" id="btn_cadastrar" class="btn btn-primary w-100">Cadastrar Vaga</button>
</form>

<?php 
    require __DIR__.'/templates/footer.php'; 
?>