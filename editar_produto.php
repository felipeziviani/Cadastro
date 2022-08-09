<?php
require 'conexao.php';
 
// Recebe o id do produto via GET
$id_produto = (isset($_GET['id'])) ? $_GET['id'] : '';
 
// Valida se existe um id e se ele é numérico
if (!empty($id_produto) && is_numeric($id_produto)):
 
    // Captura os dados do cliente solicitado
    $conexao = conexao::getInstance();
    $sql = 'SELECT id, nome, preco, foto FROM tab_produtos WHERE id = :id';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_produto);
    $stm->execute();
    $produto = $stm->fetch(PDO::FETCH_OBJ);
 
endif;
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edição de Produto</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <div class='container'>
        <fieldset>
            <legend><h1>Formulário - Edição de Produto</h1></legend>
            
            <?php if(empty($produto)):?>
                <h3 class="text-center text-danger">Produto não encontrado!</h3>
            <?php else: ?>
                <form action="action_produto.php" method="post" id='form-contato' enctype='multipart/form-data'>
                    <div class="row">
                        <label for="nome">Alterar Foto</label>
                        <div class="col-md-2">
                            <a href="#" class="thumbnail">
                              <img src="fotos/<?=$produto->foto?>" height="190" width="150" id="foto-produto">
                            </a>
                        </div>
                        <input type="file" name="foto" id="foto" value="foto" >
                    </div>
 
                    <div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome" value="<?=$produto->nome?>" placeholder="Infome o Nome">
                      <span class='msg-erro msg-nome'></span>
                    </div>
 
                    <div class="form-group">
                      <label for="email">Preço</label>
                      <input type="preco" class="form-control" id="preco" name="preco" value="<?=$produto->preco?>" placeholder="Informe o Preço">
                      <span class='msg-erro msg-preco'></span>
                    </div>
                    
                   
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="id" value="<?=$produto->id?>">
                    <input type="hidden" name="foto_atual" value="<?=$produto->foto?>">
                    <button type="submit" class="btn btn-primary" id='botao'> 
                      Gravar
                    </button>
                    <a href='listagem_produto.php' class="btn btn-danger">Cancelar</a>
                </form>
            <?php endif; ?>
        </fieldset>
 
    </div>
    <script type="text/javascript" src="js/custom_produto.js"></script>
</body>
</html>