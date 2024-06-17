<header>
    <div class="container">
        <h1>Blocos de Notas</h1>
    </div>
</header>
<h2>Blocos de Notas</h2>

<div id="lista-notas">
    <!-- As notas serão adicionadas aqui dinamicamente -->
    <div class="nota">
        <?php if (is_array($arr)) : ?>
            <?php foreach ($arr as $dado) : ?>
                <div class="titulo"><?php echo $dado["titulo"]; ?></div>
                <div class="conteudo"><?php echo $dado["descricao"]; ?></div>
                <div class="botoes">


                    <button class="botao botao-editar" onclick="abrirModalUpdate(this)" id="<?php echo $dado["id"];?>">Editar</button>

                    <br>
                    <form action="DbActions/delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $dado["id"]; ?>">

                        <button class="botao botao-excluir">Excluir</a>

                    </form>
                </div>
                <br>
                <hr>
            <?php endforeach; ?>
        <?php endif; ?>


    </div>

</div>

<!-- Botão para adicionar uma nova nota -->
<button class="botao botao-adicionar" onclick="abrirModal()">Adicionar Nota</button>

<!-- Modal para adicionar nova nota -->
<div id="modal-adicionar" class="modal">
    <div class="modal-content">
        <form action="DbActions/insert" method="post">
            <span class="fechar-modal" onclick="fecharModal()">&times;</span>
            <h3 id="update">Adicionar Nova Nota</h3>
            <input type="text" id="titulo-nota" class="modal-input" name="title" placeholder="Título da Nota" required>
            <textarea id="conteudo-nota" class="modal-input" rows="4" name="description" placeholder="Conteúdo da Nota" required></textarea>
            <button class="botao botao-adicionar">Salvar Nota</button>
        </form>

    </div>
</div>

<div id="modal-update" class="modal">
    <div class="modal-content">
        <form action="DbActions/update" method="post">
            <span class="fechar-modal" onclick="fecharModalUpdate()">&times;</span>
            <h3 id="update">Atualizar a nota</h3>
            <input type="hidden" name="id" id="id">
            <input type="text" id="titulo-nota" class="modal-input" name="title" placeholder="Título da Nota" required>
            <textarea id="conteudo-nota" class="modal-input" rows="4" name="description" placeholder="Conteúdo da Nota" required></textarea>
            <button class="botao botao-adicionar">Salvar Nota</button>
        </form>

    </div>
</div>