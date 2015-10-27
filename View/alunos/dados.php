<?php

require '../../kint/Kint.class.php';
//ddd ($_GET);

/* codigo de erros/sucessos no submit */



$con = new PDO("mysql:host=127.0.0.1;dbname=escola","root","");

$stmt = $con->prepare("select * from alunos");
$stmt->execute();

$tabelaHtml = "<table class ='table table-striped'>";
    $tabelaHtml.="<tr>";
  $tabelaHtml.="<td>Perfil</td>";
  $tabelaHtml.="<td>ID do Aluno</td>";
  $tabelaHtml.="<td>Cpf</td>";
  $tabelaHtml.="<td>Nome</td>";
  $tabelaHtml.= "<td>Telefone</td>";
  $tabelaHtml.= "<td>Edição</td>";
  $tabelaHtml.= "<td>Excluir</td>";
  $tabelaHtml.="</tr>";

while($linhadoBancoDeDados = $stmt->fetch(PDO::FETCH_OBJ)){
  
  $tabelaHtml.="<tr>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= "<img src=$linhadoBancoDeDados->vchFile width='200'> </a>";
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->idAluno;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchCPF;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchNome;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= $linhadoBancoDeDados->vchTelefone;
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= '<a ';
  $tabelaHtml.="class='btn btn-warning'";
  $tabelaHtml.= "href='../../View/alunos/editar.php?txtCPF=$linhadoBancoDeDados->vchCPF'> Editar </a>";
  $tabelaHtml.="</td>";
  $tabelaHtml.="<td>";
  $tabelaHtml.= '<a ';
  $tabelaHtml.="class='btn btn-warning'";
  $tabelaHtml.= "href='../../Controller/ExcluirController.php?txtCPF=$linhadoBancoDeDados->vchCPF'> Excluir </a>";
  $tabelaHtml.="</td>";
  $tabelaHtml.="</tr>";
}
$tabelaHtml.="</table>";


?>


<html>
    <head>
        <title>Dados do Usuario</title>
        <meta charset="utf-8">
        
        <script type="text/javascript" src="../../js/jquery/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="../../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../../css/bootstrap.css"/>
        <link rel="stylesheet" href="../../css/bootstrap-theme.css"/>
    </head>
    <body>
        <br/>
        <div class="container">
            
            <?php if(isset($_GET['tipoMsg'])){
                
                $classAlert ="";
                $mensagem = $_GET['strMsg'];
                $tituloMsg = "";
                
                    if($_GET['tipoMsg'] == 'erro'){
                        $classAlert = "alert-danger";
                        $tituloMsg = "Atenção";
                    }else{
                        
                    if ($_GET['tipoMsg'] == 'sucesso'){
                            $classAlert = 'alert-success';
                            $tituloMsg = "Sucesso";
                        }
                    }
            
            ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="alert <?php echo $classAlert; ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo $tituloMsg ; ?></strong> &nbsp; <?php echo $mensagem; ?> 
                            </div>
                        </div>
                    </div>
            
            <?php }?>

             <?php echo $tabelaHtml; ?>
               
        </div>

    </body>
</html>

