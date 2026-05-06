const btn = document.getElementById('btn-cotacao');
const select = document.getElementById('moeda-select');
const resultado = document.getElementById('resultado');

async function buscarCotacao() {
    const parMoedas = select.value; // Ex: "USD-BRL"
    const chave = parMoedas.replace('-', ''); // A API retorna a chave sem o hífen: "USDBRL"
    const url = `https://economia.awesomeapi.com.br/last/${parMoedas}`;

    resultado.innerHTML = "Buscando...";

    try {
        const response = await fetch(url);
        const dados = await response.json();
        
        // Acessamos dinamicamente usando a chave (ex: dados["USDBRL"])
        const info = dados[chave];

        resultado.innerHTML = `
            <strong>${info.name}</strong>
            <span class="preco">R$ ${parseFloat(info.bid).toFixed(2)}</span>
            <small>Variação: ${info.pctChange}%</small>
        `;
        
        console.log("Dados completos da API:", info);

    } catch (error) {
        resultado.innerHTML = "Erro ao buscar cotação.";
        console.error("Falha na requisição:", error);
    }
}

btn.addEventListener('click', buscarCotacao);