document.getElementById('form-gerador').addEventListener('submit', function(e) {
    e.preventDefault();

    const linguagem = document.getElementById('linguagem').value;
    const descricao = document.getElementById('descricao').value;

    fetch('php/gerador.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `linguagem=${encodeURIComponent(linguagem)}&descricao=${encodeURIComponent(descricao)}`
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('resultado').innerText = data;
    })
    .catch(error => {
        document.getElementById('resultado').innerText = 'Erro ao gerar código.';
    });
});
