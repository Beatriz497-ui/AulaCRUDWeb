document.getElementById('btn_atualizar').addEventListener('click', async () => {
    const msg = document.getElementById('mensagem');
    const dados = {
        id: document.getElementById('input_id').value,
        name: document.getElementById('input_name').value,
        age: document.getElementById('input_age').value,
        colour: document.getElementById('input_colour').value
    };

    msg.innerText = 'Processando...';

    try {
        // CAMINHO CORRIGIDO PARA O INDEX NA RAIZ
        const response = await fetch('index.php', { 
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dados)
        });

        const resultado = await response.json();
        msg.innerText = resultado.mensagem;

    } catch (error) {
        msg.innerText = 'Erro na requisição. Verifique o console.';
        console.error(error);
    }
});