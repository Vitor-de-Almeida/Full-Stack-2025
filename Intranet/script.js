document.getElementById('suggestion-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const nome = document.getElementById('name').value;
  const batalhao = document.getElementById('batalhao').value;
  const number = document.getElementById('number').value;
  const sugestao = document.getElementById('suggestion').value;

  alert(`Obrigado, ${nome}! Sua sugestão foi recebida:\n\n"${sugestao}"`);

  // Aqui você pode futuramente integrar com backend, ex: fetch() para API ou salvar local

  this.reset();
});
