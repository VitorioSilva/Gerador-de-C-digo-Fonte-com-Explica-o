function mostrarLogin() {
  document.getElementById('login-screen').style.display = 'block';
  document.getElementById('create-account-screen').style.display = 'none';
  document.getElementById('gerador-codigo-screen').style.display = 'none';
}

function mostrarCriarConta() {
  document.getElementById('login-screen').style.display = 'none';
  document.getElementById('create-account-screen').style.display = 'block';
  document.getElementById('gerador-codigo-screen').style.display = 'none';
}

function login() {
  const email = document.getElementById('email-login').value;
  const senha = document.getElementById('senha-login').value;
  
  // Lógica de autenticação (por exemplo, verificar se o e-mail e senha estão corretos)
  if (email && senha) {
    alert("Login bem-sucedido!");
    document.getElementById('login-screen').style.display = 'none';
    document.getElementById('gerador-codigo-screen').style.display = 'block';
  } else {
    alert("Por favor, preencha todos os campos.");
  }
}

function criarConta() {
  const email = document.getElementById('email-create').value;
  const senha = document.getElementById('senha-create').value;
  const confirmSenha = document.getElementById('confirm-senha').value;
  
  // Lógica para criar a conta (validar campos, etc.)
  if (email && senha && senha === confirmSenha) {
    alert("Conta criada com sucesso!");
    mostrarLogin();
  } else {
    alert("Por favor, verifique os dados.");
  }
}

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
    case 'javascript':
      codigo = `document.querySelector('button').addEventListener('click', function() {\n  alert('Olá!');\n});`;
      explicacao = 'Este código JavaScript adiciona um evento de clique a um botão para exibir uma mensagem.';
      break;
    case 'python':
      codigo = `print('Olá! Este é um exemplo simples.')`;
      explicacao = 'Este código Python imprime uma mensagem no console.';
      break;
    case 'c':
      codigo = `#include <stdio.h>\n\nint main() {\n  printf("Olá!\\n");\n  return 0;\n}`;
      explicacao = 'Este código C imprime uma mensagem no terminal.';
      break;
  }

  codigoEl.textContent = codigo;
  explicacaoEl.textContent = explicacao;
}
