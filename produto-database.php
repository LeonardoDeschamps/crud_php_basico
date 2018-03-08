<?php

function listaProdutos($conexao) {
    $produtos = Array();
    $sql = "SELECT p.*, c.nome AS categoria "
           . "FROM produtos AS p "
     . "INNER JOIN categorias AS c "
             . "ON c.id = p.categoria_id";
    $query = mysqli_query($conexao, $sql);
    
    while ($res = mysqli_fetch_assoc($query)){
        $produtos[] = $res;
    }
    
    return $produtos;
}