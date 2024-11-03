// Função para exibir mensagens dinâmicas
function showMessage(message, type) {
    const messageDiv = document.getElementById('message');
    messageDiv.innerHTML = message;
    messageDiv.className = 'message ' + type;
    messageDiv.style.display = 'block';

    // Ocultar a mensagem após 5 segundos
    setTimeout(function() {
        messageDiv.style.display = 'none';
    }, 5000);
}

// Verificar se o formulário foi preenchido corretamente
document.getElementById('addArmaForm').addEventListener('submit', function(event) {
    const nomeArma = document.getElementById('nome_arma').value;
    const numeroSerie = document.getElementById('numero_serie').value;
    const tipoArma = document.getElementById('tipo_arma').value;

    // Checagem dos campos obrigatórios
    if (nomeArma === '' || numeroSerie === '' || tipoArma === '') {
        showMessage('Preencha todos os campos obrigatórios.', 'error');
        event.preventDefault();
    } else {
        showMessage('Arma cadastrada com sucesso!', 'success');
    }
});
