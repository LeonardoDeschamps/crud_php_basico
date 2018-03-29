<?php

function listaCategorias($conexao, $id){
    $categorias = Array();
    $sql = "SELECT * FROM categorias WHERE id NOT IN (SELECT categoria_id FROM produtos WHERE id = $id)";
    $query = mysqli_query($conexao, $sql);
    
    while ($res = mysqli_fetch_assoc($query)){
        $categorias[] = $res;
    }
    
    return $categorias;
}

function listaProdutos($conexao) {
    $produtos = Array();
    $sql = "SELECT p.*, c.nome AS categoria "
           . "FROM produtos AS p "
           . "JOIN categorias AS c "
           .   "ON c.id = p.categoria_id";
    $query = mysqli_query($conexao, $sql);
    
    while ($res = mysqli_fetch_assoc($query)){
        $produtos[] = $res;
    }

    return $produtos;
}

function getInformacoesProduto($conexao, $id) {
    $sql = "SELECT produtos.*, categorias.id AS cat_id, categorias.nome AS cat_nome FROM produtos JOIN categorias ON (categoria_id = categorias.id) WHERE produtos.id = $id";
    $query = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $idCategoria) {
    $sql = "UPDATE produtos "
          .   "SET nome = '$nome', "
          .       "preco = $preco, "
          .       "descricao = '$descricao', "
          .       "categoria_id = $idCategoria "
          . "WHERE id = $id";
    return mysqli_query($conexao, $sql);
}
