<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sistema de Cadastro de Produtos</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
    <div class='container box-mensagem-crud'>
        <?php 
        require 'conexao.php';
 
        // Atribui uma conexão PDO
        $conexao = conexao::getInstance();
 
        // Recebe os dados enviados pela submissão
        $acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
        $id    = (isset($_POST['id'])) ? $_POST['id'] : '';
        $nome  = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $preco = (isset($_POST['preco'])) ? $_POST['preco'] : '';
        $foto_atual       = (isset($_POST['foto_atual'])) ? $_POST['foto_atual'] : '';
 
        // Valida os dados recebidos
        $mensagem = '';
        if ($acao == 'editar' && $id == ''):
            $mensagem .= '<li>ID do registros desconhecido.</li>';
        endif;
 
        // Se for ação diferente de excluir valida os dados obrigatórios
        if ($acao != 'excluir'):
            if ($nome == '' || strlen($nome) < 3):
                $mensagem .= '<li>Favor preencher o Nome.</li>';
            endif;
 
            if ($preco == ''):
                $mensagem .= '<li>Favor preencher o Preço.</li>';
            elseif(!filter_var($preco, FILTER_VALIDATE_FLOAT)):
                  $mensagem .= '<li>Formato do preço inválido.</li>';
            endif;

            if ($mensagem != ''):
                $mensagem = '<ul>' . $mensagem . '</ul>';
                echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
                exit;
            endif;
        endif;    


 
        // Verifica se foi solicitada a inclusão de dados
        if ($acao == 'incluir'):
 
            $nome_foto = 'padrao.jpg';
            if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):  
 
                $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
 
                 // Validamos se a extensão do arquivo é aceita
                if (array_search($extensao, $extensoes_aceitas) === false):
                   echo "<h1>Extensão Inválida!</h1>";
                   exit;
                endif;
 
                 // Verifica se o upload foi enviado via POST   
                 if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
                         
                      // Verifica se o diretório de destino existe, senão existir cria o diretório  
                      if(!file_exists("fotos")):  
                           mkdir("fotos");  
                      endif;  
              
                      // Monta o caminho de destino com o nome do arquivo  
                      $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
                        
                      // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                      if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
                           echo "Houve um erro ao gravar arquivo na pasta de destino!";  
                      endif;  
                 endif;  
            endif;
 
            $sql = 'INSERT INTO tab_produtos (nome, preco, foto)
                               VALUES(:nome, :preco, :foto)';
 
            $stm = $conexao->prepare($sql);
            $stm->bindValue(':nome', $nome);
            $stm->bindValue(':preco', $preco);
            $stm->bindValue(':foto', $nome_foto);
            $retorno = $stm->execute();
 
            if ($retorno):
                echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
            else:
                echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
            endif;
 
            echo "<meta http-equiv=refresh content='3;URL=listagem_produto.php'>";
        endif;
            // Verifica se foi solicitada a edição de dados
            if ($acao == 'editar'):
 
                if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0): 
     
                    // Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
                    if ($foto_atual <> 'padrao.jpg'):
                        unlink("fotos/" . $foto_atual);
                    endif;
     
                    $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
     
                     // Validamos se a extensão do arquivo é aceita
                    if (array_search($extensao, $extensoes_aceitas) === false):
                       echo "<h1>Extensão Inválida!</h1>";
                       exit;
                    endif;
     
                     // Verifica se o upload foi enviado via POST   
                     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
                             
                          // Verifica se o diretório de destino existe, senão existir cria o diretório  
                          if(!file_exists("fotos")):  
                               mkdir("fotos");  
                          endif;  
                  
                          // Monta o caminho de destino com o nome do arquivo  
                          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
                            
                          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
                          if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
                               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
                          endif;  
                     endif;
                else:
     
                    $nome_foto = $foto_atual;
     
                endif;
     
                $sql = 'UPDATE tab_produtos SET nome=:nome, preco=:preco, foto=:foto ';
                $sql .= 'WHERE id = :id';
     
                $stm = $conexao->prepare($sql);
                $stm->bindValue(':nome', $nome);
                $stm->bindValue(':preco', $preco);
                $stm->bindValue(':foto', $nome_foto);
                $stm->bindValue(':id', $id);
                $retorno = $stm->execute();
     
                if ($retorno):
                    echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
                else:
                    echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
                endif;
     
                echo "<meta http-equiv=refresh content='3;URL=listagem_produto.php'>";
            endif;
     
            // Verifica se foi solicitada a exclusão dos dados
            if ($acao == 'excluir'):
     
                // Captura o nome da foto para excluir da pasta
                $sql = "SELECT foto FROM tab_produtos WHERE id = :id AND foto <> 'padrao.jpg'";
                $stm = $conexao->prepare($sql);
                $stm->bindValue(':id', $id);
                $stm->execute();
                $produto = $stm->fetch(PDO::FETCH_OBJ);
     
                if (!empty($produto) && file_exists('fotos/'.$produto->foto)):
                    unlink("fotos/" . $produto->foto);
                endif;
     
                // Exclui o registro do banco de dados
                $sql = 'DELETE FROM tab_produtos WHERE id = :id';
                $stm = $conexao->prepare($sql);
                $stm->bindValue(':id', $id);
                $retorno = $stm->execute();
     
                if ($retorno):
                    echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
                else:
                    echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
                endif;
     
                echo "<meta http-equiv=refresh content='3;URL=listagem_produto.php'>";
            endif;
            ?>
     
        </div>
    </body>
    </html>