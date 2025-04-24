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

  if (!email || !senha) {
    alert("Preencha todos os campos.");
    return;
  }

  fetch('http://localhost:8000/api/login.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email, senha })
  })
    .then(res => res.json())
    .then(data => {
      alert(data.msg);
      if (data.msg.includes("bem-sucedido")) {
        document.getElementById('login-screen').style.display = 'none';
        document.getElementById('gerador-codigo-screen').style.display = 'block';
      }
    })
    .catch(() => alert("Erro ao se comunicar com o servidor."));
}

function criarConta() {
  const email = document.getElementById('email-create').value;
  const senha = document.getElementById('senha-create').value;
  const confirmSenha = document.getElementById('confirm-senha').value;

  if (!email  |!confirmSenha) {
    alert("Preencha todos os campos.");
    return;
  }

  if (senha !== confirmSenha) {
    alert("As senhas não coincidem.");
    return;
  }

  fetch('http://localhost:8000/api/cadastrar.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ email, senha })
  })
    .then(res => res.json())
    .then(data => {
      console.log("Resposta do servidor:", data);
      alert(data.msg);
      if (data.msg.includes("sucesso")) {
        mostrarLogin();
      }
    })
    .catch((err) => {
      console.error("Erro no fetch:", err);
      alert("Erro ao se comunicar com o servidor.");
    });
}

function gerarCodigo() {
  const linguagem = document.getElementById('linguagem').value;
  const descricao = document.getElementById('descricao').value.trim();
  const codigoEl = document.getElementById('codigo');
  const explicacaoEl = document.getElementById('explicacao');

  if (!descricao) {
    codigoEl.textContent = 'Por favor, descreva o que deseja gerar.';
    explicacaoEl.textContent = '';
    return;
  }

  fetch('http://localhost:8000/api/gerar.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ linguagem, descricao })
  })
    .then(res => res.json())
    .then(data => {
      codigoEl.textContent = data.codigo || 'Erro ao gerar código.';
      explicacaoEl.textContent = data.explicacao || '';
    })
    .catch(() => {
      codigoEl.textContent = 'Erro ao se conectar com o servidor.';
      explicacaoEl.textContent = '';
    });
}

mostrarLogin();