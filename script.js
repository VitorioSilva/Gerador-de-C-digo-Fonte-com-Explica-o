function gerarCodigo() {
    const linguagem = document.getElementById('linguagem').value;
    const descricao = document.getElementById('descricao').value.trim();
    const codigoEl = document.getElementById('codigo');
    const explicacaoEl = document.getElementById('explicacao');
  
    let codigo = '', explicacao = '';
  
    if (!descricao) {
      codigoEl.textContent = 'Por favor, descreva o que deseja gerar.';
      explicacaoEl.textContent = '';
      return;
    }
  
    switch (linguagem) {
      case 'html':
        codigo = <button onclick="alert('Olá!')">Clique aqui</button>;
        explicacao = 'Este código HTML cria um botão que exibe uma mensagem de alerta quando clicado.';
        break;
      case 'javascript':
        codigo = `document.querySelector('button').addEventListener('click', function() {\n  alert('Olá!');\n});`;
        explicacao = 'Este código JavaScript adiciona um evento de clique a um botão para exibir uma mensagem.';
        break;
      case 'python':
        codigo = print('Olá! Este é um exemplo simples.');
        explicacao = 'Este código Python imprime uma mensagem no console.';
        break;
      case 'css':
        codigo = `button {\n  background-color: blue;\n  color: white;\n  padding: 10px;\n}`;
        explicacao = 'Este CSS estiliza botões com fundo azul e texto branco.';
        break;
      case 'c':
        codigo = `#include <stdio.h>\n\nint main() {\n  printf("Olá!\\n");\n  return 0;\n}`;
        explicacao = 'Este código C imprime uma mensagem no terminal.';
        break;
    }
  
    codigoEl.textContent = codigo;
    explicacaoEl.textContent = explicacao;
  }