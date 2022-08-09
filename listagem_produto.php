<?php
require 'conexao.php';
 
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
 
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
 
    $conexao = conexao::getInstance();
    $sql = 'SELECT * FROM tab_produtos';
    $stm = $conexao->prepare($sql);
    $stm->execute();
    $produtos = $stm->fetchAll(PDO::FETCH_OBJ);
 
else:
 
    // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
    $conexao = conexao::getInstance();
    $sql = 'SELECT id, nome, preco, foto FROM tab_produtos WHERE nome LIKE :nome';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', $termo.'%');
    $stm->execute();
    $produtos = $stm->fetchAll(PDO::FETCH_OBJ);
 
endif;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listagem de produtos</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="shortcut icon" href="img/produtos.ico" type="image/x-icon">
</head>
<body>
    <div class='container'>
        <fieldset>
 
            <!-- Cabeçalho da Listagem -->
            <legend><h1>Cadastro e Listagem de Produtos</h1></legend>
 
            <!-- Formulário de Pesquisa -->
            <form action="" method="get" id='form-produto' class="form-horizontal col-md-10">
                <label class="col-md-2 control-label" for="termo">Pesquisar</label>
                <div class='col-md-7'>
                    <input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome do Produto">
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
                <a href='listagem_produto.php' class="btn btn-primary">Ver Todos</a>
            </form>
 
            <!-- Link para página de cadastro -->
            <a href='cadastro_produto.php' class="btn btn-success pull-right">Cadastrar Produto</a>
            <div class='clearfix'></div>
 
            <?php if(!empty($produtos)):?>
 
                <!-- Tabela de Produtos -->
                <table class="table table-striped">
                    <tr class='active'>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ação</th>
                    </tr>
                    <?php foreach($produtos as $produto):?>
                        <tr>
                            <td><img src='fotos/<?=$produto->foto?>' height='40' width='40'></td>
                            <td><?=$produto->nome?></td>
                            <td><?=$produto->preco?></td>
                            <td>
                                <a href='editar_produto.php?id=<?=$produto->id?>' class="btn btn-primary">Editar</a>
                                <a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$produto->id?>">Excluir</a>
                            </td>
                        </tr>  
                    <?php endforeach;?>
                </table>
 
            <?php else: ?>
 
                <!-- Mensagem caso não exista produtos ou não encontrado  -->
                <h3 class="text-center text-primary">Não existem produtos cadastrados!</h3>
            <?php endif; ?>
        </fieldset>
    </div>
    <script type="text/javascript" src="js/custom_produto.js"></script>
</body>
</html>