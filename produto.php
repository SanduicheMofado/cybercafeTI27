<?php
include("conectadb.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome=$_POST['nome'];
    $desc=$_POST['desc'];
    $estoque=$_POST['estoque'];
    $custo=$_POST['custo'];
    $preco=$_POST['preco'];
}
$bancodedados="SELECT COUNT(pro_id) FROM produtos WHERE pro_nome='$nome'";
$resultado=mysqli_query($link,$bancodedados);

while($tbl=mysqli_fetch_array($resultado)){
    $contagem=$tbl[0];
    if($contagem==0){
        $bancodedados="INSERT INTO produtos(pro_id,pro_nome,pro_desc,pro_preco,pro_estoq,pro_custo,pro_ativo) VALUES($id,$nome,$desc,$preco,$estoque,$custo,$ativo)";
        mysqli_query($link,$bancodedados);
    }
    else{
        echo("PRODUTO JÁ CADASTRADO");
        header("location:produto.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRAR PRODUTO</title>
</head>
<body>
    <form action="produto.php" method="post">
        <label>NOME</label>
        <input type="text" name="nome">
        <br>
        <label>DESCRICÃO</label>
        <input type="text" name="desc">
        <br>
        <label>PREÇO</label>
        <input type="text" name="preco">
        <br>
        <label>ESTOQUE</label>
        <input type="number" name="estoque">
        <br>
        <label>CUSTO</label>
        <input type="text" name="custo">
        <br>
        <input type="submit" value="CADASTRAR PRODUTO">
    </form>
</body>
</html>
