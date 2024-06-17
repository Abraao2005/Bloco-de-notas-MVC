



// Função para abrir o modal de adicionar nova nota
function abrirModal() {
    const modal = document.getElementById('modal-adicionar');
    modal.style.display = 'flex';
}

function abrirModalUpdate(a) {
    const modal = document.getElementById('modal-update');
    modal.style.display = 'flex';
    let inputHidden = document.querySelector("#id");
    console.log(a.getAttribute("id"));


    if (inputHidden) {
        inputHidden.value = a.getAttribute("id")
    }
}

// Função para fechar o modal de adicionar nova nota
function fecharModal() {
    const modal = document.getElementById('modal-adicionar');
    modal.style.display = 'none';
}


// Atualiza a lista de blocos de notas e fecha o modal
fecharModal();

function fecharModalUpdate() {
    const modal = document.getElementById('modal-update');
    modal.style.display = 'none';
}
fecharModalUpdate()

// Limpa os campos do formulário no modal
document.getElementById('titulo-nota').value = '';
document.getElementById('conteudo-nota').value = '';


