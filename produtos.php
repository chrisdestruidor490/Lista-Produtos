<?php
    include_once 'model/clsProduto.php';
    include_once 'dao/clsConexão.php';
    include_once 'dao/clsProdutoDAO.php';
    
    
    
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista M171 - Produtos</title>
    </head>
    <body>
        <?php
            require_once 'menu.php';
        ?>
        
        <h1 align="center">Produtos</h1>
        
        <br><br><br>
        
        <a href="frmProduto.php">
            <button>Cadastrar novo produto</button></a>
        
        <br><br>
        <?php
            $lista = ProdutoDAO::getProdutos();
            
            if( $lista->count() == 0 ){
                echo '<h3><b>Nenhum produto cadastrado!</b></h3>';
            } else {
              
        ?>
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Total</th>
                <th>Excluir</th>
            </tr>
            
            <?php  
            $total=0;
                    foreach ($lista as $pro){
                        echo '<tr> ';
                        echo '   <td>'.$pro->getId().'</td>';
                        echo '   <td>'.$pro->getNome().'</td>';
                        echo '   <td>'.$pro->getQuantidade().'</td>';
                        echo '   <td>'.$pro->getPreco().'</td>';
                        $subTotal = $pro->getPreco()* $pro->getQuantidade();
                        echo '   <td>'.$subTotal.'</td>';
                        $total=$total+$subTotal; 
                        
                        
                        echo '   <td><a href="controller/salvarProduto.php?excluir&idProduto='.$pro->getId().'" ><button>Excluir</button></a></td>';
                        echo '</tr>';
                        
                    }
            ?>
            
        </table>
        <h2>Total: <?php                echo 'R$ '.$total;?></h2>
        <?php
        
            }
            
        ?>
        
    </body>
</html>