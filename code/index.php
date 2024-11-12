<?php 
    $template['title'] = 'Login';
    $template['esconder_menu'] = true;
    require __DIR__.'/templates/header.php'; 
?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Login</h2>
        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="campoLogin" class="form-label">Login</label>
                <input name="login" type="text" class="form-control" id="campoLogin" placeholder="Digite seu login" required>
            </div>
            <div class="mb-3">
                <label for="campoSenha" class="form-label">Senha</label>
                <input name="senha" type="password" class="form-control" id="campoSenha" placeholder="Digite sua senha" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</div>


<?php 
    require __DIR__.'/templates/footer.php'; 
?>