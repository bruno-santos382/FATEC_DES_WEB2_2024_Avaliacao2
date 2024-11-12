async function removerVaga(element, id) {
    // Confirmação de remoção
    if (!confirm('Tem certeza que deseja remover esta vaga?')) {
        return;
    }

    const btnRemover = element;
    btnRemover.setAttribute('disabled', true);
    btnRemover.textContent = 'Removendo...';

    try {
        const formData = new FormData();
        formData.append('id', id);
        // Envia a requisição para remover a vaga
        const response = await fetch('api.php?route=vagas/remover', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        // Verifica sucesso na remoção
        if (data.status === 'ok') {
            const tbody = element.closest('tbody');
            element.closest('tr').remove();  // Remove a linha da tabela

            if (tbody.children.length === 0) {
                tbody.innerHTML = '<tr><td colspan="100" class="text-center">Nenhum resultado encontrado.</td></tr>';
            }
        } else {
            alert(data.mensagem || 'Erro ao remover a vaga.');
        }
    } catch (error) {
        console.error(error);
        alert('Ocorreu um erro. Tente novamente.');
    }

    // Restaura o botão
    btnRemover.removeAttribute('disabled');
    btnRemover.textContent = 'Remover';
}
