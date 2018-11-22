<?php
    include_once 'dao/clsProdutoDAO.php';
    include_once 'model/clsProduto.php';
    include_once 'dao/clsConexão.php';  
    
    
    
    
$nome = ""; 
$preco = ""; 
$quantidade = "";  
$action = "inserir";    
    
if( isset($_REQUEST['editar'])) {  
    $id = $_REQUEST['idProduto'];
    $produto = ProdutoDAO::getProdutoById($id); 
    $nome= $produto->getNome();
    $preco = $produto->getPreco();
    $quantidade = $produto->getQuantidade();
    $total = $produto->getTotal();
    $action = "editar&idProduto=".$produto->getId();
}
    
     
?>





<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Market M171 - Cadastrar Produto</title>
    </head>
    <body>
        <?php
            require_once 'menu.php';
        ?>
        
         <h1 align="center">Cadastrar Produto</h1>
        
        <br><br><br>
        
        <form action="controller/salvarProduto.php?<?php echo $action;  ?>" method="POST" 
              enctype="multipart/form-data">
            <label>Nome: </label>
            <input type="text" name="txtNome" value="<?php echo $nome;  ?>" required maxlength=" 100" /> <br><br>
            <label>Preço: </label>
            <input type="text" name="txtPreco" value="<?php echo $preco;  ?>" maxlength="30" /> <br><br>
            <label>Quantidade: </label>
            <input type="text" name="txtQuantidade" value="<?php echo $quantidade;  ?>"required /> <br><br>
           
            
            </select>
            
            <br><br>
           
            
            <input type="submit" value="Salvar" />
            <input type="reset" value="Limpar" />
            
            
        </form>
        
        
    </body>
</html>