function adicionarTarefa() {
    var inputTarefa = document.getElementById("tarefa");
    var inputPrioridade = document.getElementById("prioridade");

    if (inputTarefa.value !== "") {
      var lista = document.getElementById("lista-de-tarefas");
      var item = document.createElement("li");
      var checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.name = "tarefa-feita";
      checkbox.value = inputTarefa.value;
      if (inputPrioridade.checked) {
        item.classList.add("prioridade");
      }
      item.appendChild(checkbox);
      item.appendChild(document.createTextNode(inputTarefa.value));

      // adiciona botão de exclusão
      var botaoExcluir = document.createElement("button");
      botaoExcluir.style.backgroundColor = "transparent";
      botaoExcluir.style.border="none"
      botaoExcluir.innerHTML = "🗑️";
      botaoExcluir.onclick = function() {
        lista.removeChild(item);
      };
      item.appendChild(botaoExcluir);

      lista.appendChild(item);
      inputTarefa.value = "";
      inputPrioridade.checked = false;
    }
    var botaoExcluirTodos = document.getElementById("botao-excluir-todos");
    var listaDeTarefas = document.getElementById("lista-de-tarefas");
    
    botaoExcluirTodos.addEventListener("click", function() {
      listaDeTarefas.innerHTML = "";
    });
  }