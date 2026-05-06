document.getElementById('unicornForm').addEventListener('submit', async (e) => {

    e.preventDefault();

    const dados = {

        name: document.getElementById('name').value,

        age: parseInt(document.getElementById('age').value),

        colour: document.getElementById('colour').value

    };



    try {

        const response = await fetch('API-create.php', {

            method: 'POST',

            headers: { 'Content-Type': 'application/json' },

            body: JSON.stringify(dados)

        });



        const resultado = await response.json();

       

        if (response.ok) {

            document.getElementById('resultado').innerHTML = ` Sucesso! ID: ${resultado._id}`;

        } else {

            document.getElementById('resultado').innerHTML = ` Erro: ${resultado.mensagem}`;

        }

    } catch (error) {

        console.error("Erro na requisição:", error);

    }

});