document.getElementById('form_cadastro').addEventListener('submit', async function(event) {
    event.preventDefault();  // Impede o envio do formulário de forma convencional

    // Coleta os dados do formulário
    const formData = new FormData(this);
    const btnCadastrar = document.getElementById('btn_cadastrar');
    btnCadastrar.setAttribute('disabled', true);
    btnCadastrar.text = 'Carregando...';

    try {
        // Envia os dados via fetch
        const response = await fetch('api.php?route=vagas/cadastrar', {
            method: 'POST',
            body: formData
        });

        // Analisa a resposta como JSON
        const data = await response.json();
        if (data.status === 'ok') {
            this.reset();
            alert('Vaga cadastrada com sucesso!');
        } else {
            alert(data.mensagem || 'Erro ao cadastrar vaga.');
        }
    } catch (error) {
        console.error(error)
        alert('Ocorreu um erro inesperado. Tente novamente.');
    }

    btnCadastrar.removeAttribute('disabled');
    btnCadastrar.text = 'Cadastrar Vaga';
    
});
