// Aguarda carregar completamente para não ter erros
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const inputId = document.querySelector('input[name="id"]');

    if (form) {
        form.addEventListener('submit', (event) => { //
            const idValue = inputId.value.trim();

            //  Verifica se o ID tem o tamanho esperado 
            if (idValue.length < 10) {
                alert("Por favor, insira um ID de unicórnio válido.");
                event.preventDefault(); // Impede o envio do formulário
                return;
            }

            // Pergunta ao usuário se ele tem certeza
            const confirmacao = confirm(`Deseja realmente excluir o unicórnio com ID: ${idValue}?`);
            
            if (!confirmacao) {
                event.preventDefault(); // Cancela a ação se o usuário clicar em "Cancelar"
            }
        });
    }
});