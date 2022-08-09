<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <div class='container'>
        <fieldset>
            <legend><h1>Formulário - Cadastro de Produtos</h1></legend>
            
            <form action="action_produto.php" method="post" id='form-produto' enctype='multipart/form-data'>
                <div class="row">
                    <label for="nome">Selecionar Foto</label>
                    <div class="col-md-2">
                        <a href="#" class="thumbnail">
                          <img src="fotos/padrao.jpg" height="190" width="150" id="foto-produto">
                        </a>
                    </div>
                    <input type="file" name="foto" id="foto" value="foto" >
                </div>
 
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
                  <span class='msg-erro msg-nome'></span>
                </div>
 
                <div class="form-group">
                  <label for="email">Preço</label>
                  <input type="preco" class="form-control" id="preco" name="preco" placeholder="Informe o Preço">
                  <span class='msg-erro msg-preco'></span>
                </div>
                <input type="hidden" name="acao" value="incluir">
                <button type="submit" class="btn btn-primary" id='botao'>
                  Gravar
                </button>
                <a href='listagem_produto.php' class="btn btn-danger">Cancelar</a>
            </form>
        </fieldset>
    </div>
    <script type="text/javascript" src="js/custom_produto.js"></script>
</body>
</html>