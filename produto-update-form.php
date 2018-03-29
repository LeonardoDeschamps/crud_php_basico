<?php
include_once("cabecalho.php");
include_once("conexao.php");
include_once("produto-database.php");
$produto = getInformacoesProduto($conexao, $_GET["id"]);
?>

<form method="GET" action="produto-update.php">
    <input type="hidden" value="<?= $_GET["id"] ?>" name="id">
    <div class="form-group">
        <label class="control-label">Nome</label>
        <input class="form-control" placeholder="Nome" type="text" name="nome" value="<?= $produto["nome"] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Preço</label>
        <input class="form-control" placeholder="Preço" type="text" name="preco" value="<?= $produto["preco"] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Descrição</label>
        <input class="form-control" placeholder="Descrição" type="text" name="descricao" value="<?= $produto["descricao"] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Categoria</label>
        <select class="form-control" name="categoria">
            <option value="<?= $produto["cat_id"] ?>"><?= $produto["cat_nome"] ?></option>
            <?php
            $categorias = listaCategorias($conexao, $produto["id"]);
            foreach ($categorias as $categoria) {
            ?>
                <option value="<?= $categoria["id"] ?>"><?= $categoria["nome"] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-group-justified">Enviar</button>
</form>

<?php
include_once("rodape.php");
