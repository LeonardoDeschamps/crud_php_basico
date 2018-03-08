<?php
    include_once("cabecalho.php");
    include_once("conexao.php");
    include_once("produto-database.php");
?>

<table class="table table-striped table-bordered">
    <thead>
        <th>Nome</th>
        <th>Preço</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Ações</th>
    </thead>
    <?php
        $produtos = listaProdutos($conexao);
        foreach ($produtos as $produto) {
    ?>
            <tr>
                <td><?= $produto["nome"] ?></td>
                <td><?= $produto["preco"] ?></td>
                <td><?= $produto["descricao"] ?></td>
                <td><?= $produto["categoria"] ?></td>
                <td>
                    <a class="btn btn-primary" href="produto-update-form.php">U</a>
                </td>
            </tr>
    <?php 
        }
    ?>
</table>

<?php include_once("rodape.php");