<?php
include_once("conexao.php");
include_once("produto-database.php");
alteraProduto($conexao, $_GET["id"], $_GET["nome"], $_GET["preco"], $_GET["descricao"], $_GET["categoria"]);
header("Location: produto-lista.php");